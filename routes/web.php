<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;


Auth::routes(['reset' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Ticket routes
Route::get('/contact', [ContactController::class, 'getContact'])
    ->middleware([])->name("getContact");
Route::post('/contact', [ContactController::class, 'contact'])
    ->middleware([])->name("postContact");
Route::get('/tickets', [ContactController::class, 'getAllTickets'])
    ->middleware(['auth'])->name("getAllTickets");
Route::post('/tickets/{id}/process', [ContactController::class, 'setTicketSolved'])
    ->middleware(['auth'])->name("postSetTicketSolved");
Route::post('/tickets/{id}/trash', [ContactController::class, 'setTicketTrashed'])
    ->middleware(['auth'])->name("postSetTicketTrashed");
Route::get('/ticket/{id}', [ContactController::class, 'getTicketInfo'])
    ->middleware(['auth'])->name("getGetTicketInfo");

//Profile routes
Route::get('/profile/{id}', [ProfileController::class, 'display'])
    ->middleware(['auth'])->name("getGetProfile");
Route::post('/profile/{id}', [ProfileController::class, 'saveEdit'])
    ->middleware(['auth', 'canEditProfile'])->name("postSaveEditProfile");
Route::post('/uploadAvatar/{id}', [ProfileController::class, 'uploadAvatar'])
    ->middleware(['auth', 'canEditProfile'])->name("postUploadAvatar");
Route::get('/subscribedArticles/{id}', [ProfileController::class, 'getSubscribedArticles'])
    ->middleware([])->name("getGetSubscribedArticles");
//Admin routes
Route::post('/banUser/{id}', [ProfileController::class, 'banUser'])
    ->middleware(['auth', 'isAdmin'])->name("postBanUser");
Route::post('/unbanUser/{id}', [ProfileController::class, 'unbanUser'])
    ->middleware(['auth', 'isAdmin'])->name("postUnbanUser");
Route::post('/adminUser/{id}', [ProfileController::class, 'adminUser'])
    ->middleware(['auth', 'isSuperAdmin'])->name("postAdminUser");
Route::post('/unadminUser/{id}', [ProfileController::class, 'unadminUser'])
    ->middleware(['auth', 'isSuperAdmin'])->name("postUnadminUser");

//Main page (article) routes
Route::get('/getArticles', [ArticleController::class, 'getArticles']);
Route::post('/addArticle', [ArticleController::class, 'addArticle']);
Route::get('/viewArticle/{id}', [ArticleController::class, 'viewArticle']);
Route::get('/editArticle/{id}', [ArticleController::class, 'getEditArticle']);
Route::post('/editArticle/{id}', [ArticleController::class, 'editArticle']);
Route::get('/isSubscribed/{id}', [ArticleController::class, 'isSubscribed']);
Route::post('/subscribe/{id}', [ArticleController::class, 'subscribe']);
Route::post('/unsubscribe/{id}', [ArticleController::class, '@unsubscribe']);
Route::post('/deleteArticle/{id}', [ArticleController::class, 'deleteArticle']);