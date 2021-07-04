<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', function () {
        return view('company.blog');
    });

    Auth::routes();

    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // AdminPanel Show
    Route::get('/admin-panel' , [\App\Http\Controllers\AdminPanelController::class, 'Index'])->name('showadminPanel');
    Route::get('/admin-register' , [\App\Http\Controllers\AdminPanelController::class, 'registerPage'])->name('showregister');
    Route::get('/admin-login' , [\App\Http\Controllers\AdminPanelController::class, 'loginPage'])->name('showlogin');


    //Category Route
    Route::get('/category' , [\App\Http\Controllers\CategoryController::class, 'index'])->name('showcategory');
    Route::post('/category-add' , [\App\Http\Controllers\CategoryController::class, 'addCategory'])->name('categoryadd');
    Route::get('/category-edit/{id}' , [\App\Http\Controllers\CategoryController::class, 'categoryEdit'])->name('categoryedit');
    Route::post('/category-update/{id}' , [\App\Http\Controllers\CategoryController::class, 'categoryUpdate'])->name('cateupdate');
    Route::get('/category-delete/{id}' , [\App\Http\Controllers\CategoryController::class, 'categoryDelete'])->name('catedelete');
    Route::get('/category-show' , [\App\Http\Controllers\CategoryController::class, 'categoryShow'])->name('cateShow');
    Route::get('/category-one/{nam:name}' , [\App\Http\Controllers\CategoryController::class, 'categoryOne'])->name('cateone');

    //Brand Route
    Route::get('/brands', [App\Http\Controllers\BrandController::class , 'Index'])->name('showbrand');
    Route::post('/brands-add', [App\Http\Controllers\BrandController::class , 'brandAdd'])->name('brand.store');
    Route::get('/brands-edit/{id}', [App\Http\Controllers\BrandController::class , 'brandEdit'])->name('brand.edit');
    Route::get('/brands-delete/{id}', [App\Http\Controllers\BrandController::class , 'brandDelete'])->name('brand.delete');


    //Company Hero Slider Route

    Route::get('/slider' , [App\Http\Controllers\HeroController::class , 'Index'])->name('show.hero');
    Route::post('/slider-add' , [App\Http\Controllers\HeroController::class , 'sliderCreate'])->name('hero.create');
    Route::get('/slider-edit/{id}' , [App\Http\Controllers\HeroController::class , 'heroEdit'])->name('hero.edit');
    Route::get('/slider-delete/{id}' , [App\Http\Controllers\HeroController::class , 'heroDelete'])->name('hero.delete');
    Route::post('/slider-update/{id}' , [App\Http\Controllers\HeroController::class , 'heroUpdate'])->name('hero.update');


    //backend About Us Section
    Route::get('/aboutus', [App\Http\Controllers\AboutusController::class , 'Index'])->name('show.aboutus');
    Route::post('/aboutus-create', [App\Http\Controllers\AboutusController::class , 'aboutusCraete'])->name('aboutus.create');
    Route::get('/aboutus-edit/{id}', [App\Http\Controllers\AboutusController::class , 'aboutusEdit'])->name('aboutus.edit');
    Route::get('/aboutus-delete/{id}', [App\Http\Controllers\AboutusController::class , 'aboutusDelete'])->name('aboutus.delete');


    //Backend Home Services
    Route::get('/homeservices', [App\Http\Controllers\HomeServicesController::class , 'Index'])->name('show.services');
    Route::get('/homeservices-create', [App\Http\Controllers\HomeServicesController::class , 'servicesCreate'])->name('services.create');
    Route::post('/homeservices-create', [App\Http\Controllers\HomeServicesController::class , 'servicesStore'])->name('services.store');









    //FrontEnd Home  Page Route
    Route::get('/home' , [App\Http\Controllers\HomaPageController::class, 'Index'])->name('show.homepage');









