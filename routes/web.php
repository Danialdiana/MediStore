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
    Route::post('/preparats/{preparat}/cart',[PreparatController::class,'cart'])->name('preparats.cart');
    Route::get('/cart',[PreparatController::class,'cartIndex'])->name('cart.index');
    Route::get('/story',[PreparatController::class,'cartStory'])->name('cart.story');
    Route::post('/preparats/{preparat}',[PreparatController::class,'cartDestroy'])->name('cart.destroy');
    Route::put('/cart/sales',[PreparatController::class,'sales'])->name('cart.sales');
    Route::get('/profile',[\App\Http\Controllers\Adm\UserController::class,'profIndex'])->name('profile.index');
    Route::post('/profile/{user}',[\App\Http\Controllers\Adm\UserController::class,'profStore'])->name('profile.store');
    Route::get('/payment',[\App\Http\Controllers\CartController::class,'payment'])->name('payment.index');
    Route::put('/payment/{user}',[\App\Http\Controllers\Adm\UserController::class,'paymentStore'])->name('payment.store');
    Route::post('/preparats/{preparat}/select',[PreparatController::class,'select'])->name('preparat.select');
    Route::get('/preparats/select',[PreparatController::class,'selectIndex'])->name('select.index');
    Route::post('/preparats/{preparat}/destroy',[PreparatController::class,'selectDestroy'])->name('select.destroy');


    Route::prefix('adm')->as('adm.')->middleware('hasRole:Admin')->group(function (){
        Route::get('/users/search',[\App\Http\Controllers\Adm\UserController::class,'index'])->name('users.search');
        Route::get('/user/{user}/edit',[\App\Http\Controllers\Adm\UserController::class,'edit'])->name('users.edit');
        Route::put('/user/{user}',[\App\Http\Controllers\Adm\UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[\App\Http\Controllers\Adm\UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[\App\Http\Controllers\Adm\UserController::class,'unban'])->name('users.unban');
        Route::get('/roles',[\App\Http\Controllers\Adm\RoleController::class,'index'])->name('roles.index');
        Route::get('/orders',[\App\Http\Controllers\Adm\UserController::class,'orders'])->name('orders.index');
        Route::put('/orders/{cart}/confirm',[\App\Http\Controllers\CartController::class,'confirm'])->name('orders.confirm');
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
Route::get('languages/{languages}',[\App\Http\Controllers\LanguagesController::class,'switchLanguages'])->name('switch.languages');
//Auth::routes();

Route::get('/register',[\App\Http\Controllers\Auth2\RegisterController::class,'create'])->name('register.form');
Route::post('/register',[\App\Http\Controllers\Auth2\RegisterController::class,'register'])->name('register');
Route::get('/login',[\App\Http\Controllers\Auth2\LoginController::class,'create'])->name('login.form');
Route::post('login',[\App\Http\Controllers\Auth2\LoginController::class,'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
