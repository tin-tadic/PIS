<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;


Auth::routes(['reset' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Ticket routes
Route::get('/contact', [ContactController::class, 'getContact'])
    ->middleware(['auth', 'isDisabled'])->name("getContact");
Route::post('/contact', [ContactController::class, 'contact'])
    ->middleware(['auth', 'isDisabled'])->name("postContact");
Route::get('/tickets', [ContactController::class, 'getAllTickets'])
    ->middleware(['auth', 'isAdmin'])->name("getAllTickets");
Route::get('/tickets/{id}/process', [ContactController::class, 'setTicketSolved'])
    ->middleware(['auth', 'isAdmin'])->name("postSetTicketSolved");
Route::get('/tickets/{id}/trash', [ContactController::class, 'setTicketTrashed'])
    ->middleware(['auth', 'isAdmin'])->name("postSetTicketTrashed");
Route::get('/ticket/{id}', [ContactController::class, 'getTicketInfo'])
    ->middleware(['auth', 'isAdmin'])->name("getGetTicketInfo");

//Profile routes
Route::get("/editProfile/{id}", [ProfileController::class, 'getEdit'])
    ->middleware(['auth', 'canEditProfile', 'isDisabled'])->name("getEditProfile");
Route::get('/profile/{id}', [ProfileController::class, 'display'])
    ->middleware(['auth'])->name("getGetProfile");
Route::post('/editProfile/{id}', [ProfileController::class, 'saveEdit'])
    ->middleware(['auth', 'canEditProfile', 'isDisabled'])->name("postSaveEditProfile");
//Admin routes
Route::get('/banUser/{id}', [ProfileController::class, 'banUser'])
    ->middleware(['auth', 'isAdmin'])->name("postBanUser");
Route::get('/unbanUser/{id}', [ProfileController::class, 'unbanUser'])
    ->middleware(['auth', 'isAdmin'])->name("postUnbanUser");
Route::get('/adminUser/{id}', [ProfileController::class, 'adminUser'])
    ->middleware(['auth', 'isSuperAdmin'])->name("postAdminUser");
Route::get('/unadminUser/{id}', [ProfileController::class, 'unadminUser'])
    ->middleware(['auth', 'isSuperAdmin'])->name("postUnadminUser");
Route::get("/removeCoupon/{id}", [ProfileController::class, 'removeCoupon'])
    ->middleware('auth', 'isAdmin')->name("removeCoupon");

//Main page (article) routes
Route::get('/addArticle', [ArticleController::class, 'getAddArticle'])
    ->middleware(['auth', 'isAdmin'])->name("getAddArticle");
Route::post('/addArticle', [ArticleController::class, 'addArticle'])
    ->middleware(['auth', 'isAdmin'])->name("postAddArticle");
Route::get('/viewArticle/{id}', [ArticleController::class, 'viewArticle'])
    ->name("viewArticle");
Route::get('/editArticle/{id}', [ArticleController::class, 'getEditArticle'])
    ->middleware(['auth', 'isAdmin'])->name("getEditArticle");
Route::post('/editArticle/{id}', [ArticleController::class, 'editArticle'])
    ->middleware(['auth', 'isAdmin'])->name("postEditArticle");
Route::get('/subscribe/{id}', [ArticleController::class, 'subscribe'])
    ->middleware(['auth', 'isDisabled'])->name('subscribe');
Route::get('/unsubscribe/{id}', [ArticleController::class, 'unsubscribe'])
    ->middleware(['auth', 'isDisabled'])->name('unsubscribe');
Route::get('/deleteArticle/{id}', [ArticleController::class, 'deleteArticle'])
    ->middleware(['auth', 'isAdmin'])->name("deleteArticle");