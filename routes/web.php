<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

Route::controller(PageController::class)->group(function() {

    // Client
    Route::get('/', 'index');
    Route::get('/articles', 'articles');
    Route::get('/article/{slug}', 'article');
    Route::get('/about', 'about');

    // Process
    Route::post('/register', 'register')->middleware('validation');
    Route::get('/search', 'search');

    // Admin Authorization
    Route::middleware('cekAdmin')->group(function () {

        // Admin
        Route::prefix('admin')->group(function () {
            Route::get('main', 'admin');
            Route::get('post', 'posts');
            Route::get('postForm', 'postForm');
            Route::get('view/{slug}', 'articleAdmin');
            Route::get('edit-form/{slug}', 'editForm');
            Route::get('all/posts', 'allPosts');
            Route::get('profile', 'profile');
            Route::get('editProfile/{id}', 'editProfile');
        });

        // Process
        Route::post('/create', 'create')->middleware('formValidation');
        Route::put('/admin/edit/{id}', 'edit')->middleware('formValidation');
        Route::put('/admin/edit/user/{id}', 'editUser')->middleware('userEditValidation');
        Route::delete('/admin/delete/{slug}', 'deleteArticle');

    });

});

Route::controller(LoginController::class)->group(function() {

    // Login Page
    Route::get('/login', 'login');
    Route::get('/registrasi', 'registrasi');

    // Process Auth
    Route::post('authenticate', 'authenticate');
    Route::post('logout', 'logout')->middleware('cekAdmin');

});

