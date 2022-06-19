<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::get('/', function () {
    return view('welcome');
});

// Categorirs Admin Controller
Route::get('/Categories',[CategoriesController::class,'showCategories'])->name('Categories');
Route::post('/addCategory',[CategoriesController::class,'addCategory'])->name('addCategory');
Route::get('/fetchCategory',[CategoriesController::class,'fetchCategory'])->name('fetchCategory');
Route::get('/editCategory/{id}',[CategoriesController::class,'editCategory'])->name('editCategory');
Route::put('/updateCategory/{id}',[CategoriesController::class,'updateCategory'])->name('updateCategory');
Route::post('/deletCategory/{id}',[CategoriesController::class,'deletCategory'])->name('deletCategory');

// SubCategorirs Admin Controller
Route::get('/subCategory/{id}',[SubCategoryController::class,'showSubCategory'])->name('subCategory');

});



