<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Auth::routes();

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/', [PostController::class,'index'])->name('index');

    # POST
    Route::group(['prefix'=> 'post', 'as' => 'post.'], function(){
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/create', [PostController::class, 'store'])->name('store');
        Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [PostController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy');
         });
         # Comment
        Route::group(['prefix' => 'comment', 'as' => 'comment.'], function(){
            Route::post('/{post_id}/store', [CommentController::class,'store'])->name('store');
            Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('destroy');

        });

            route::group(["prefix"=>"profile","as"=>"profile."],function(){        Route::get('/show',[ProfileController::class,'show'])->name('show');
                // route for edit
                Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
                // route for update
                Route::patch('/update',[ProfileController::class,'update'])->name('update');

        });

});

