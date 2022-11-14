<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparatController;

Route::get('/', function () {return redirect()->route('preparats.index');});

Route::middleware('auth')->group(function (){
    Route::resource('preparats',PreparatController::class)->except('index','show');
    Route::post('/logout',[\App\Http\Controllers\Auth2\LoginController::class,'logout'])->name('logout');
    Route::post('/comments',[CommentController::class,'store'])->name('comments.store');
    Route::get('/preparats/comments/{comment}/edit',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');

    Route::prefix('adm')->as('adm.')->middleware('hasRole:Admin')->group(function (){
        Route::get('/users/search',[\App\Http\Controllers\Adm\UserController::class,'index'])->name('users.search');
        Route::get('/user/{user}/edit',[\App\Http\Controllers\Adm\UserController::class,'edit'])->name('users.edit');
        Route::put('/user/{user}',[\App\Http\Controllers\Adm\UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[\App\Http\Controllers\Adm\UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[\App\Http\Controllers\Adm\UserController::class,'unban'])->name('users.unban');
        Route::get('/roles',[\App\Http\Controllers\Adm\RoleController::class,'index'])->name('roles.index');
    });

    Route::prefix('adm')->as('adm.')->middleware('hasRole:Admin,Moderator')->group(function (){
        Route::get('/users',[\App\Http\Controllers\Adm\UserController::class,'index'])->name('users.index');
        Route::get('/categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('categories.index');
        Route::post('/categories/',[\App\Http\Controllers\CategoryController::class,'store'])->name('categories.store');
        Route::delete('/categories/{category}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('categories.destroy');

        Route::get('/comments',[\App\Http\Controllers\Adm\AdmCommentController::class,'index'])->name('comments.index');
        Route::get('/comments/search',[\App\Http\Controllers\Adm\AdmCommentController::class,'index'])->name('comments.search');


        Route::get('/types',[\App\Http\Controllers\Adm\TypeController::class,'index'])->name('types.index');
        Route::post('/types',[\App\Http\Controllers\Adm\TypeController::class,'store'])->name('types.store');
        Route::delete('/types/{type}',[\App\Http\Controllers\Adm\TypeController::class,'destroy'])->name('types.destroy');

    });
});
Route::resource('preparats',PreparatController::class)->only('index','show');
Route::get('/preparats/category/{category}',[PreparatController::class,'ByCategory'])->name('preparats.category');

//Auth::routes();

Route::get('/register',[\App\Http\Controllers\Auth2\RegisterController::class,'create'])->name('register.form');
Route::post('/register',[\App\Http\Controllers\Auth2\RegisterController::class,'register'])->name('register');

Route::get('/login',[\App\Http\Controllers\Auth2\LoginController::class,'create'])->name('login.form');
Route::post('login',[\App\Http\Controllers\Auth2\LoginController::class,'login'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
