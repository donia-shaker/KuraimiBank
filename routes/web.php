<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CitiesController;
use App\Http\Controllers\admin\CountriesController;
use App\Http\Controllers\admin\ServicePointsController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Models\service_points;
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

// SubCategories Admin Controller
Route::get('/subCategory/{id}',[SubCategoryController::class,'showSubCategory'])->name('subCategory');
Route::get('/fetchSubCategory/{id}',[SubCategoryController::class,'fetchSubCategory'])->name('fetchSubCategory');
Route::post('/subCategory/addSubCategory',[SubCategoryController::class,'addSubCategory'])->name('addSubCategory');
Route::get('/subCategory/editSubCategory/{id}',[SubCategoryController::class,'editSubCategory'])->name('addSubCategory');
Route::put('/subCategory/updateSubCategory/{id}',[SubCategoryController::class,'updateSubCategory'])->name('updateSubCategory');
Route::get('/subCategory/deleteSubCategory/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('deleteSubCategory');
Route::get('/subCategory/activeSubCategory/{id}',[SubCategoryController::class,'activeSubCategory'])->name('activeSubCategory');

// Countries Admin Controller
Route::get('/countries',[CountriesController::class,'showCountries'])->name('countries');
Route::post('/addCountry',[CountriesController::class,'addCountry'])->name('addCountry');
Route::get('/fetchCountry',[CountriesController::class,'fetchCountry'])->name('fetchCountry');
Route::get('/editCountry/{id}',[CountriesController::class,'editCountry'])->name('editCountry');
Route::put('/updateCountry/{id}',[CountriesController::class,'updateCountry'])->name('updateCountry');
Route::post('/activeCountry/{id}',[CountriesController::class,'activeCountry'])->name('activeCountry');
Route::post('/deleteCountry/{id}',[CountriesController::class,'deleteCountry'])->name('deleteCountry');

// Cities Admin Controller
Route::get('/cities/{id}',[CitiesController::class,'showCities'])->name('cities');
Route::get('/fetchCities/{id}',[CitiesController::class,'fetchCities'])->name('fetchCities');
Route::post('/cities/addCity',[CitiesController::class,'addCity'])->name('addCity');
Route::get('/cities/editCity/{id}',[CitiesController::class,'editCity'])->name('editCity');
Route::put('/cities/updateCity/{id}',[CitiesController::class,'updateCity'])->name('updateCity');
Route::get('/cities/deleteCity/{id}',[CitiesController::class,'deleteCity'])->name('deleteCity');
Route::get('/cities/activeCity/{id}',[CitiesController::class,'activeCity'])->name('activeCity');

// Service Points Admin Controller
Route::get('/cities/servPoint/{id}',[ServicePointsController::class,'showServPoints'])->name('ServPoin');
Route::get('/cities/servPoint/fetchServPoint/{id}',[ServicePointsController::class,'fetchServPoint'])->name('fetchServPoint');
// Route::get('/showAddServPoint',[ServicePointsController::class,'showAddServPoint'])->name('showAddServPoint');
Route::post('/addServPoint',[ServicePointsController::class,'addServPoint'])->name('addServPoint');
Route::get('/cities/servPoint/editServPoint/{id}',[ServicePointsController::class,'editServPoint'])->name('editServPoint');
Route::put('/cities/servPoint/updateServPoint/{id}',[ServicePointsController::class,'updateServPoint'])->name('updateServPoint');
Route::get('/cities/servPoint/deleteServPoint/{id}',[ServicePointsController::class,'deleteServPoint'])->name('deleteServPoint');
Route::get('/cities/servPoint/activeServPoint/{id}',[ServicePointsController::class,'activeServPoint'])->name('activeServPoint');

// Categorirs Admin Controller
Route::get('/socialMedia',[SocialMediaController::class,'showSocialMedia'])->name('sociaMedia');
Route::post('/addSocialMedia',[SocialMediaController::class,'addSocialMedia'])->name('addSocialMedia');
Route::get('/fetchSocialMedia',[SocialMediaController::class,'fetchSocialMedia'])->name('fetchSocialMedia');
Route::get('/editSocialMedia/{id}',[SocialMediaController::class,'editSocialMedia'])->name('editSocialMedia');
Route::put('/updateSocialMedia/{id}',[SocialMediaController::class,'updateSocialMedia'])->name('updateMainSocialMedia');
Route::post('/activeSocialMedia/{id}',[SocialMediaController::class,'activeSocialMedia'])->name('activeSocialMedia');
Route::post('/deleteSocialMedia/{id}',[SocialMediaController::class,'deleteSocialMedia'])->name('deleteSocialMedia');

});



