<?php

use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->group(function () {
    Route::post('/', [PostsController::class, 'create']);
    Route::get('/{post}', [PostsController::class, 'show']);
    Route::patch('/{post}', [PostsController::class, 'update']);
    Route::put('/{post}', [PostsController::class, 'update']);
    Route::post('/{post}/tags/{tag}', [PostsController::class, 'addTag']);
    Route::delete('/{post}/tags/{tag}', [PostsController::class, 'destroy']);
});