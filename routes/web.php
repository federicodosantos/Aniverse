<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/health', function () {
    return response()->json(
        [
            'status' => 'ok'
        ],
        200
    );
});

Route::get('sign-in-google', [AuthenticatedSessionController::class, 'google'])
    ->name('user.login.google');
Route::get('/auth/google/callback', [AuthenticatedSessionController::class, 'handleCallbackProvider'])
    ->name('user.google.callback');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// order routes
Route::middleware('auth')->group(function () {
    Route::post('/order/{product}', [\App\Http\Controllers\OrderController::class, 'store'])
        ->name('order.store');
});
Route::get('/payments/callback', [\App\Http\Controllers\OrderController::class, 'handleCallback']);
Route::post('/payments/callback', [\App\Http\Controllers\OrderController::class, 'handleCallback']);

require __DIR__ . '/auth.php';

// anime routes
Route::get('anime/{id}', [ItemsController::class, 'showDetail'])
    ->name('anime.detail');

Route::get('/hot-anime', [ItemsController::class, 'getHotAnime'])
    ->name('hot-anime');

Route::get('/anime-list', [ItemsController::class, 'showAllAnime'])
    ->name('animes');

Route::get('/animes', [ItemsController::class, 'showPageAnimes']);

// manga routes
Route::get('manga/{id}', [ItemsController::class, 'showDetail'])
    ->name('manga.detail');

Route::get('/hot-manga', [ItemsController::class, 'getHotManga'])
    ->name('hot-manga');

Route::get('/manga-list', [ItemsController::class, 'showAllManga'])
    ->name('mangas');

Route::get('/mangas', [ItemsController::class, 'showPageMangas']);


// shop routes
Route::get('/shop/history', [\App\Http\Controllers\OrderController::class, 'getAllHistory'])
->name('shop.history');

Route::get('/shop', [\App\Http\Controllers\ProductController::class, 'showPage'])
    ->name('shop');
Route::get('/shop-create', [\App\Http\Controllers\ProductController::class, 'showCreate'])
    ->name('shop.create');

// product routes
Route::get('/home-product', [\App\Http\Controllers\ProductController::class, 'showHomeProduct'])
    ->name('home-product');

Route::get('/product-list', [\App\Http\Controllers\ProductController::class, 'showAll'])
    ->name('product.list');

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'showDetail'])
    ->name('product.detail');

Route::post('/product-create', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('product.create');

Route::patch('/product-update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('product.update');

Route::get('/product-edit/{id}', [\App\Http\Controllers\ProductController::class, 'showUpdateForm'])
    ->name('product.edit');

Route::delete('/product-delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])
    ->name('product.delete');

Route::get('/about', function () {
    return view('about');
});

// discuss routes
Route::get('/discuss', [\App\Http\Controllers\DiscussionController::class, 'showAll'])
    ->name('discuss.index');
Route::get('/discuss/create', [\App\Http\Controllers\DiscussionController::class, 'createForm'])
    ->name('discuss.create.form');
Route::post('/discuss/create', [\App\Http\Controllers\DiscussionController::class, 'create'])
    ->name('discuss.create');
Route::get('/discuss/{id}', [\App\Http\Controllers\DiscussionController::class, 'showDetail'])
    ->name('discuss.show');
Route::patch('/discuss/{topic}', [\App\Http\Controllers\DiscussionController::class,'update'])
    ->name('discuss.update');
Route::delete('/discuss/{topic}', [\App\Http\Controllers\DiscussionController::class, 'delete'])
    ->name('discuss.destroy');

// comment routes
Route::post('/comment/{discuss}', [\App\Http\Controllers\CommentController::class, 'create'])
    ->name('comment.create');
