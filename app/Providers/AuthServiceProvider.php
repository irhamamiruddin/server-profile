<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Fortify;
use LdapRecord\Connection;
use App\Models\User;
use Exception;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Fortify::authenticateUsing(function ($request) {
            $username = $request->username;

            // check if username exist in users table
            $user = User::where('username', $username)->first();

            // if the user exist then check the login type

            if ($user && ($user->user_login_type == "local")) {
                return $this->_loginLocal($request);
            }

            try {
                $ldapData = $this->_attemptLDAPLogin($request);

                if ($ldapData) {
                    $user = $this->_loginUser($user, $ldapData);

                    return $user;
                }
            } catch (\Throwable $th) {
                Log::error(__FUNCTION__, [$th->getMessage()]);
            }

            return null;
        });
    }

    private function _attemptLDAPLogin($request)
    {
        $username = $request->username;

        $connection = new Connection(config('ldap.connections.default'));

        $user_format = config('ldap.user_format');

        $userdn = sprintf($user_format, $username);

        $password = $request->password;

        try {
            Log::info($connection->auth()->attempt($userdn, $password));

            if ($connection->auth()->attempt($userdn, $password)) {
                Log::info("Username and password are correct!", [__FUNCTION__]);

                $user = $connection->query()->find($userdn);

                // Log::info("LDAP User Data: ", [$user]);

                return $user;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage(), [__FUNCTION__]);
        }
        return false;
    }

    private function _loginUser($user, $ldapData)
    {
        $role = Role::where('name', 'Staff')->first();

        if (!$user) {
            $user = new User();
            $user->name = $ldapData['cn'][0];
            $user->email = $ldapData['mail'][0];
            $user->username = $ldapData['uid'][0];
            $user->user_login_type = "ldap";
            $user->password = '';
            $user->save();
        } else {
            $user->name = $ldapData['cn'][0];
            $user->email = $ldapData['mail'][0];
            $user->save();
        }

        $user->assignRole([$role->id]);

        Auth::login($user);

        return $user;
    }

    private function _loginLocal($request)
    {
        return Auth::guard('web')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ]) ? Auth::guard('web')->user() : null;
    }
}
