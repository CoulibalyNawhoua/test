<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;

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



Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::get('profil', [ProfileController::class, 'profile_user'])->name('profile.user');
    Route::get('parametre', [ProfileController::class, 'edit_user'])->name('profile.edit');
    Route::put('profil-update', [ProfileController::class, 'update_user'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('post/create',[PublicationController::class,'create_pub'])->name('create.pub');
    Route::get('post',[PublicationController::class,'index_publication'])->name('liste_pub');
    Route::post('pub_store',[PublicationController::class,'pub_store'])->name('pub.store');
    Route::get('post/edit/{id}',[PublicationController::class,'pub_edit'])->name('pub.edit');
    Route::put('post-updat{id}',[PublicationController::class,'pub_update'])->name('pub.update');
    Route::get('post-delete/{id}',[PublicationController::class,'pub_delete'])->name('pub.delete');
    Route::get('post-show{id}',[PublicationController::class,'pub_show'])->name('pub.show');
    Route::post('publish-post',[PublicationController::class,'publish_post']);
    Route::get('listing-post',[PublicationController::class,'all_publication'])->name('listing_pub');
    Route::get('detail-post/{id}',[PublicationController::class,'show_post'])->name('pub.details');
    Route::get('detail-pub/{id}',[HomeController::class,'show_post'])->name('details.pub');

    Route::get('export-excell',[PublicationController::class,'export_publication'])->name('export.excell');
    Route::get('generate-pdf',[PublicationController::class,'generatePDF'])->name('generate.pdf');

    Route::post('rating',[HomeController::class,'store_rating'])->name('store.rating');



});

require __DIR__.'/auth.php';
