<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SocialMediaController;
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
Route::put('/updateMainCategory/{id}',[CategoriesController::class,'updateCategory'])->name('updateMainCategory');
Route::post('/activeCategory/{id}',[CategoriesController::class,'activeCategory'])->name('activeCategory');
Route::post('/deleteCategory/{id}',[CategoriesController::class,'deleteCategory'])->name('deleteCategory');

// SubCategorirs Admin Controller
Route::get('/subCategory/{id}',[SubCategoryController::class,'showSubCategory'])->name('subCategory');
Route::get('/fetchSubCategory/{id}',[SubCategoryController::class,'fetchSubCategory'])->name('fetchSubCategory');
Route::post('/subCategory/addSubCategory',[SubCategoryController::class,'addSubCategory'])->name('addSubCategory');
Route::get('/subCategory/editSubCategory/{id}',[SubCategoryController::class,'editSubCategory'])->name('addSubCategory');
Route::put('/subCategory/updateSubCategory/{id}',[SubCategoryController::class,'updateSubCategory'])->name('updateSubCategory');
Route::get('/subCategory/deleteSubCategory/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('deleteSubCategory');
Route::get('/subCategory/activeSubCategory/{id}',[SubCategoryController::class,'activeSubCategory'])->name('activeSubCategory');


// Categorirs Admin Controller
Route::get('/socialMedia',[SocialMediaController::class,'showSocialMedia'])->name('sociaMedia');
Route::post('/addSocialMedia',[SocialMediaController::class,'addSocialMedia'])->name('addSocialMedia');
Route::get('/fetchSocialMedia',[SocialMediaController::class,'fetchSocialMedia'])->name('fetchSocialMedia');
Route::get('/editSocialMedia/{id}',[SocialMediaController::class,'editSocialMedia'])->name('editSocialMedia');
Route::put('/updateSocialMedia/{id}',[SocialMediaController::class,'updateSocialMedia'])->name('updateMainSocialMedia');
Route::post('/activeSocialMedia/{id}',[SocialMediaController::class,'activeSocialMedia'])->name('activeSocialMedia');
Route::post('/deleteSocialMedia/{id}',[SocialMediaController::class,'deleteSocialMedia'])->name('deleteSocialMedia');

});



