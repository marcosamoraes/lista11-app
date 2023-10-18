<?php

use App\Http\Controllers\PagesController;
use App\Models\User;
use App\Notifications\ClientCreated;
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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/empresas', [PagesController::class, 'listing'])->name('listing');
Route::get('/empresa/{company:slug}/avaliacao', [PagesController::class, 'reviewCompany'])->name('company.review');
Route::get('/empresa/{city}/{company:slug}', [PagesController::class, 'viewCompany'])->name('listing.view');
Route::post('/empresa/{company:slug}/avaliacao', [PagesController::class, 'storeReviewCompany'])->name('company.review.store');
Route::post('/empresa/{company:slug}/contato', [PagesController::class, 'contactCompany'])->name('company.contact');
Route::get('/cadastro', [PagesController::class, 'register'])->name('register');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [PagesController::class, 'viewPost'])->name('blog.view');
Route::get('/contato', [PagesController::class, 'contact'])->name('contact');
Route::post('/contato', [PagesController::class, 'storeContact'])->name('contact.store');

Route::get('/mailable', function () {
    return (new ClientCreated('123456'))->toMail(User::first());
});
