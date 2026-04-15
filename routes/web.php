<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/contattaci', [PublicController::class, 'contattaci'])->name('contattaci');
Route::post('/contattaci', [PublicController::class, 'contactUsForm'])->name('contactUsForm');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');


Route::get('/user/profile', [PublicController::class,'profile'])->name('user.profile');

Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/category/create/submit', [CategoryController::class, 'store'])->name('category.submit')->middleware('auth');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/show/{category}', [CategoryController::class, 'show'])->name('category.show');