<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CitiesController;
use App\Http\Controllers\admin\CountriesController;
use App\Http\Controllers\admin\ExchangeRatesController;
use App\Http\Controllers\admin\FinancialReportsController;
use App\Http\Controllers\admin\JobsController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\OurPartinersController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\ServicePointsController;
use App\Http\Controllers\admin\ServisesAdvantagesController;
use App\Http\Controllers\admin\ServisesController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\WebsiteInfoController;
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
Route::post('/addServPoint',[ServicePointsController::class,'addServPoint'])->name('addServPoint');
Route::get('/cities/servPoint/editServPoint/{id}',[ServicePointsController::class,'editServPoint'])->name('editServPoint');
Route::post('/cities/servPoint/updateServPoint/{id}',[ServicePointsController::class,'updateServPoint'])->name('updateServPoint');
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


// Admin Services Manage
Route::get('/services', [ServisesController::class, 'showServices'])->name('services');
Route::post('/addService', [ServisesController::class, 'addService'])->name('addService');
Route::post('/editService/{id}', [ServisesController::class, 'editService'])->name('editService');
Route::post('/activeService/{id}', [ServisesController::class, 'activeService'])->name('activeService');
Route::post('/positionService/{id}', [ServisesController::class, 'positionService'])->name('positionService');
Route::post('/deleteService/{id}', [ServisesController::class, 'deleteService'])->name('deleteService');

// Services Advantage Controller
Route::get('/serviceAdv/{id}',[ServisesAdvantagesController::class,'showServiceAdv'])->name('serviceAdv');
// Route::get('/serviceAdvAdd',[ServisesAdvantagesController::class,'serviceAdvAdd'])->name('serviceAdvAdd');
Route::post('/addServiceAdv',[ServisesAdvantagesController::class,'addServiceAdv'])->name('addServiceAdv');
// Route::get('/cities/editCity/{id}',[ServisesAdvantagesController::class,'editCity'])->name('editCity');
// Route::put('/cities/updateCity/{id}',[ServisesAdvantagesController::class,'updateCity'])->name('updateCity');
// Route::get('/cities/deleteCity/{id}',[ServisesAdvantagesController::class,'deleteCity'])->name('deleteCity');
// Route::get('/cities/activeCity/{id}',[ServisesAdvantagesController::class,'activeCity'])->name('activeCity');

// Admin news Manage
Route::get('/news', [NewsController::class, 'showNews'])->name('news');
Route::post('/addNews', [NewsController::class, 'addNews'])->name('addNews');
Route::post('/editNews/{id}', [NewsController::class, 'editNews'])->name('editNews');
Route::post('/activeNews/{id}', [NewsController::class, 'activeNews'])->name('activeNews');
Route::post('/positionNews/{id}', [NewsController::class, 'positionNews'])->name('positionNews');
Route::post('/deleteNews/{id}', [NewsController::class, 'deleteNews'])->name('deleteNews');

// Admin Rate Manage
Route::get('/rate', [ExchangeRatesController::class, 'showRate'])->name('rate');
Route::post('/addRate', [ExchangeRatesController::class, 'addRate'])->name('addRate');
Route::post('/editRate/{id}', [ExchangeRatesController::class, 'editRate'])->name('editRate');
Route::post('/activeRate/{id}', [ExchangeRatesController::class, 'activeRate'])->name('activeRate');
Route::post('/deleteRate/{id}', [ExchangeRatesController::class, 'deleteRate'])->name('deleteRate');

// Admin jobs Manage
Route::get('/jobs', [JobsController::class, 'showjobs'])->name('jobs');
Route::post('/addjobs', [JobsController::class, 'addjobs'])->name('addjobs');
Route::post('/editjobs/{id}', [JobsController::class, 'editjobs'])->name('editjobs');
Route::post('/activejobs/{id}', [JobsController::class, 'activejobs'])->name('activejobs');
Route::post('/deletejobs/{id}', [JobsController::class, 'deletejobs'])->name('deletejobs');

// Admin reports Manage
Route::get('/reports', [FinancialReportsController::class, 'showreports'])->name('reports');
Route::post('/addreports', [FinancialReportsController::class, 'addreports'])->name('addreports');
Route::post('/editreports/{id}', [FinancialReportsController::class, 'editreports'])->name('editreports');
Route::post('/activereports/{id}', [FinancialReportsController::class, 'activereports'])->name('activereports');
Route::post('/deletereports/{id}', [FinancialReportsController::class, 'deletereports'])->name('deletereports');

// Admin partiners Manage
Route::get('/partiners', [OurPartinersController::class, 'showpartiners'])->name('partiners');
Route::post('/addpartiners', [OurPartinersController::class, 'addpartiners'])->name('addpartiners');
Route::post('/editpartiners/{id}', [OurPartinersController::class, 'editpartiners'])->name('editpartiners');
Route::post('/activepartiners/{id}', [OurPartinersController::class, 'activepartiners'])->name('activepartiners');
Route::post('/deletepartiners/{id}', [OurPartinersController::class, 'deletepartiners'])->name('deletepartiners');

// Admin pages Manage
Route::get('/pages', [PagesController::class, 'showpages'])->name('pages');
Route::post('/addpages', [PagesController::class, 'addpages'])->name('addpages');
Route::post('/editpages/{id}', [PagesController::class, 'editpages'])->name('editpages');
Route::post('/activepages/{id}', [PagesController::class, 'activepages'])->name('activepages');
Route::post('/deletepages/{id}', [PagesController::class, 'deletepages'])->name('deletepages');

// admin Manage websiteInfo
Route::get('/website', [WebsiteInfoController::class, 'website'])->name('website');
Route::get('/editwebsite', [WebsiteInfoController::class, 'editwebsite'])->name('editwebsite');

});



