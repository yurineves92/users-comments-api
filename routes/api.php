<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CommentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Authentication and register routes */
Route::post('login', [AuthController::class, 'loginUser']);
Route::post('register', [AuthController::class, 'createUser']);


/* Authenticated and profile, comments routes */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [ProfileController::class, 'userInfo'])->name('user.info');

    Route::get('comments', [CommentController::class, 'getAllComments'])->name('comments.list');
    Route::post('comments', [CommentController::class, 'createComment'])->name('comments.create');
    Route::put('comments/{id}', [CommentController::class, 'updateComment'])->name('comments.update');
    Route::delete('comments/{id}', [CommentController::class, 'deleteComment'])->name('comments.destroy');
});
