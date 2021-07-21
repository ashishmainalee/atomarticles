<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ArticlesController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\MessagesController;

Route::get('/', [NewsController::class, 'index'])->name('frontend.home');
Route::get('/about', [NewsController::class, 'about'])->name('frontend.about');
Route::get('/terms', [NewsController::class, 'terms'])->name('frontend.terms');
Route::get('/policies', [NewsController::class, 'policies'])->name('frontend.policies');
Route::get('/gallery', [NewsController::class, 'gallery'])->name('frontend.gallery');
Route::get('/contact', [NewsController::class, 'contact'])->name('frontend.contact');
Route::get('/{category}/show', [NewsController::class, 'getNewsByCategory'])->name('frontend.categories');
Route::post('/contact/submit-form', [NewsController::class, 'submitForm'])->name('frontend.submit-form');
Route::get('/article/{article}/show', [NewsController::class, 'showArticle'])->name('frontend.articles');
Route::get('/search', [NewsController::class, 'search'])->name('frontend.search');

Route::group(['middleware' => ['auth'], 'prefix' => 'backend'], function () {

    Route::get('/dashboard', function () { return view('backend.dashboard'); })->name('backend.dashboard');

    // Articles routes
    Route::get('/articles', [ArticlesController::class, 'index'])->name('backend.articles');
    Route::get('/articles/trashed', [ArticlesController::class, 'getTrashed'])->name('backend.articles.trashed');
    Route::get('/articles/create', [ArticlesController::class, 'create'])->name('backend.articles.create');
    Route::post('/articles/store', [ArticlesController::class, 'store'])->name('backend.articles.store');
    Route::get('/articles/{article}/show', [ArticlesController::class, 'show'])->name('backend.articles.show');
    Route::get('/articles/{article}/restore', [ArticlesController::class, 'restore'])->name('backend.articles.restore');
    Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('backend.articles.edit');
    Route::patch('/articles/{article}/update', [ArticlesController::class, 'update'])->name('backend.articles.update');
    Route::get('/articles/{article}/trash', [ArticlesController::class, 'trash'])->name('backend.articles.trash');
    Route::get('/articles/{article}/delete', [ArticlesController::class, 'delete'])->name('backend.articles.delete');
    Route::get('/articles/delete-all', [ArticlesController::class, 'deleteAll'])->name('backend.articles.delete-all');
    Route::get('/articles/trash-all', [ArticlesController::class, 'trashAll'])->name('backend.articles.trash-all');
    Route::get('/articles/restore-all', [ArticlesController::class, 'restoreAll'])->name('backend.articles.restore-all');

    // Categories routes
    Route::get('/categories', [CategoriesController::class, 'index'])->name('backend.categories');
    Route::get('/categories/trashed', [CategoriesController::class, 'getTrashed'])->name('backend.categories.trashed');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('backend.categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('backend.categories.store');
    Route::get('/categories/{category}/show', [CategoriesController::class, 'show'])->name('backend.categories.show');
    Route::get('/categories/{category}/restore', [CategoriesController::class, 'restore'])->name('backend.categories.restore');
    Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('backend.categories.edit');
    Route::patch('/categories/{category}/update', [CategoriesController::class, 'update'])->name('backend.categories.update');
    Route::get('/categories/{category}/trash', [CategoriesController::class, 'trash'])->name('backend.categories.trash');
    Route::get('/categories/{category}/delete', [CategoriesController::class, 'delete'])->name('backend.categories.delete');

    // Setting Routes
    Route::get('/about', [SettingsController::class, 'about'])->name('backend.settings.about');
    Route::patch('/about/{about}/update', [SettingsController::class, 'updateAbout'])->name('backend.settings.about-update');
    Route::get('/password', [SettingsController::class, 'password'])->name('backend.settings.password');
    Route::patch('/password/update', [SettingsController::class, 'updatePassword'])->name('backend.settings.password-update');
    Route::get('/profile', [SettingsController::class, 'profile'])->name('backend.settings.profile');
    Route::patch('/profile/update', [SettingsController::class, 'updateProfile'])->name('backend.settings.profile-update');

    // Gallery Routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('backend.gallery');
    Route::get('/gallery/manage', [GalleryController::class, 'manage'])->name('backend.gallery.manage');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('backend.gallery.create');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('backend.gallery.edit');
    Route::patch('/gallery/{id}/update', [GalleryController::class, 'update'])->name('backend.gallery.update');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('backend.gallery.store');
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'destroy'])->name('backend.gallery.destroy');


    // Messages Routes
    Route::get('/messages', [MessagesController::class, 'index'])->name('backend.messages');
    Route::get('/messages/show/{id}', [MessagesController::class, 'show'])->name('backend.messages.show');
    Route::get('/messages/destroy/{id}', [MessagesController::class, 'destroy'])->name('backend.messages.destroy');
});

Route::fallback(function () {
    return view("errors.404");
});
require __DIR__.'/auth.php';
