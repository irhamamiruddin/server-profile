<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $queries = ['search','page'];
        $filters = $request -> all($queries);

        if (Auth::check())
            $permissions = Auth::user()->getAllPermissions();
        else
            $permissions = null;

        return array_merge(parent::share($request), [
            'filters' => $filters,
            'permissions' => $permissions,
            'auth'=>['user' => $request->user() ?   $request->user()->only('id', 'name', 'email') : null,
                    'can' =>$request->user() ? $request->user()->getPermissionArray() : []
                ],
        ]);
    }
}
