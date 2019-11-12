<?php

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

use App\Http\Controllers\ViewRFQController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('rfqs', 'RfqController');

Route::group(['prefix' => 'manage', 'middleware' => 'role:superadministrator|administrator'], function ()
{
    
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('teams', 'TeamController');

    Route::resource('requesttypes', 'RequestTypeController');

    Route::resource('procategories', 'PcategoryController');

    Route::resource('suppliertypes', 'SupplierTypeController');

    Route::resource('rfqstatus', 'RfqstatusController');

    Route::resource('departments','DepartmentController');

});


Route::group([ 'prefix' => 'tenders', 'middleware' => 'role:superadministrator|user'],function ()
{
    Route::get('usertenders','RfqresponseController@usertenders')->name('usertenders');
    Route::get('rfqresponse/userquotations/{quotes}', 'RfqresponseController@userviewquotations')->name('userviewQuotations');
    Route::get('rfqresponse/userQoute','RfqresponseController@userquote')->name('userQuotation');
    Route::resource('tender','ViewRFQController');
    
});

Route::prefix('rfquserview')->group(function () 
{
    Route::get('rfqresponse/quotations/{quotes}', 'RfqresponseController@quotations')->name('viewQuotations');
    Route::get('rfqresponse/quotes/{quotes}', 'RfqresponseController@quotes')->name('quotations');
});

Route::resource('rfqresponse', 'RfqresponseController');

Route::post('addcomment/{rfq}','CommentController@addRfqComment')->name('addcomment');
Route::resource('comment','CommentController',['only'=>['update','destroy']]);

Route::fallback(function() {
    //return 'Hm, why did you land here somehow?';
    //This can be passed a specific page to show the user what they
    //Have done
    return view('welcome');
});

Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";
});

