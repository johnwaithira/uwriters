<?php


    use User\Uwriters\app\controller\Dashboard;
    use User\Uwriters\app\controller\HomeController;
    use User\Uwriters\app\route\Route;

    Route::get('/', [HomeController::class, 'landing']);
    Route::get('/backup', [Dashboard::class, 'db']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/blogs', [HomeController::class, 'blogs']);
    Route::get('/blog/post', [HomeController::class, 'blog']);
    Route::get('/services', [HomeController::class, 'services']);
    Route::get('/portfolio', [HomeController::class, 'portfolio']);
    Route::get('/login', [HomeController::class, 'login']);
    Route::get('/admin', [Dashboard::class, 'admin']);
    Route::get('/profile', [Dashboard::class, 'profile']);
    Route::get('/settings', [Dashboard::class, 'settings']);
    Route::get('/post', [Dashboard::class, 'new']);
    Route::get('/admin/portfolio', [Dashboard::class, 'port']);
    Route::get('/view', [Dashboard::class, 'viewpost']);
    Route::get('/message', [Dashboard::class, 'message']);
    Route::get('/reply', [Dashboard::class, 'reply']);
    Route::get('/logout', [Dashboard::class, 'optout']);
    Route::get('/logout', [Dashboard::class, 'optout']);
    Route::get('/unreadmsg/get', [Dashboard::class, 'unreadmsg']);
    Route::get('/upload', [Dashboard::class, 'upload']);

    Route::post('/admin/login', [Dashboard::class, 'login']);
    Route::post('/client/contact', [Dashboard::class, 'contact']);
    Route::post('/post', [Dashboard::class, 'post']);
    Route::post('/profile', [Dashboard::class, 'upd_profile']);
    Route::post('/admin/portfolio',[Dashboard::class, 'pot']);
    Route::post('/sub/newsletter', [HomeController::class, 'newsletter_sub']);
    Route::post('/landing', [Dashboard::class, 'landing']);
    Route::post('/abt', [Dashboard::class, 'abt']);
    Route::post('/upload', [Dashboard::class,'img']);
