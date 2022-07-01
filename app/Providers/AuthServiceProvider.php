<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Fortify;
use LdapRecord\Connection;

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

            if ($username == "admin") {
                return $this->_loginLocal($request);
            }

            try {
                $ldapData = $this->_attemptLDAPLogin($request);

                if ($ldapData) {
                    $user = $this->_loginUser($request->username, $ldapData);

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

    private function _loginUser($username, $ldapData)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            $user = new User();
            $user->name = $ldapData['cn'][0];
            $user->email = "";
            $user->username = $username;
            $user->password = '';
            $user->save();
        } else {
            $user->name = $ldapData['cn'][0];
            $user->save();
        }

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
