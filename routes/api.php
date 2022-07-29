<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Server;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/server-list', function (Request $request) {
    $searchName = $request->searchName;
    return response()->json(Server::with('applications')->where('name', 'LIKE', "%$searchName%")
    ->paginate(5)->toArray());
});
