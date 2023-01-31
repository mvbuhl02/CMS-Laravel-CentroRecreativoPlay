<?php

use Illuminate\Support\Facades\Route;

//-- AUTH --
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
//-- ADMIN --

use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GalleryOneController;
use App\Http\Controllers\Admin\GalleryTwoController;
use App\Http\Controllers\Admin\GalleryThreeController;
use App\Http\Controllers\Admin\UsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AboutController;


use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



//Route::get('/add', [App\Http\Controllers\Admin\TeamController::class, 'create'])->name('home');

//-- Página Home --
Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index']);
Route::get('galeria', [App\Http\Controllers\Site\GalleryController::class, 'loadPictures']);
Route::get('retornoajax', function(){
    return view('site.page');
});
//Route::resource('galeria', GalleryOneController::class);
// teste de upload de imagens



//-- Painel --
Route::prefix('/painel')->group(function(){

    //-- AUTH --
    Route::get('login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');



    Route::resource('register', RegisterController::class);





    //-- ADMIN --

    Route::resource('slider', SliderController::class);

    Route::resource('cursos', CourseController::class);



    // Galleries controllers
    Route::get('galeria', [GalleriesController::class, 'index']);

    Route::resource('galleryOne', GalleryOneController::class);


    Route::resource('nos', UsController::class);

    Route::resource('equipe', TeamController::class);

    Route::resource('info', AboutController::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profilesave', [ProfileController::class, 'save'])->name('profile.save');

    Route::resource('/users', UserController::class);
});
