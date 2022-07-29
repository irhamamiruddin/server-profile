<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\SearchResultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return response()->json(Server::with('applications')->get()->toArray());
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        // 'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::post("roles/{roles}/restore",[RoleController::class,"restore"])->name("roles.restore");

    Route::resource('users', UserController::class);
    Route::post("users/{users}/restore",[UserController::class,"restore"])->name("users.restore");

    Route::resource('servers', ServerController::class);
    Route::post("servers/{servers}/restore",[ServerController::class,"restore"])->name("servers.restore");

    Route::resource('applications', ApplicationController::class);
    Route::post("applications/{applications}/restore",[ApplicationController::class,"restore"])->name("applications.restore");

    Route::resource('activities', ActivityController::class);
    Route::resource('documentations', DocumentationController::class);

    // Route::get('search',SearchResultController::class)->name('search.result');
});
