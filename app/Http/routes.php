<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\App;
//民眾用頁面route
Route::get('/', 'HomeController@index');
Route::get('call/input', 'CallController@show');
Route::post('call/input', 'CallController@create');
Route::get('donate/input', 'DonateController@create');
Route::get('guidance', 'GuidanceController@index');
//Route::get('guidance_map', 'GuidanceController@');
//Route::get('application_input', 'ApplicationController@');
Route::get('missing_poster/input', 'MissingPosterController@create');

//登入用route
Route::get('login', 'LoginController@show');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
//這行上面的請勿移動


//-------------------------------------------分隔線-------------------------------------------------------

//下面請根據權限放至各Panel下  (此為暫放)

//call manage 動態印出通報用
Route::post('call/manage', 'CallController@update');
Route::post('call/manage/save', 'CallController@store');

//call manage 創建新任務
Route::post('call/manage/createMission', 'MissionController@create');
Route::get('call/manage/auto_complete', 'MissionController@auto_complete');//auto_complete

//mission manage()
//中央指揮官
Route::post('mission/manage', 'MissionController@update');
//地方指揮官
//Route::get('mission/manage/local', 'MissionLocalController@index');
//Route::post('mission/manage/local', 'MissionLocalController@update');
//-------------------------------------------分隔線-------------------------------------------------------
Route::get('mission/manage', 'MissionController@index');
//需要設定權限的route
//Route::get('login', 'LoginController@index');
//Route::post('login', 'LoginController@login');
Route::resource('post', 'HomeController');

//Route::group(function () {
//
//    //Route::resource('post',array('as' => 'administratorPanel', 'uses' => 'HomeController') );
//    Route::get('post',array('as' => 'administratorPanel', 'uses' => 'HomeController@index'));
//    Route::get('user_pages.home',array('as' => 'moderatorPanel', 'uses' => 'PagesController@index'));
//    //Route::resource('post', 'HomeController');
//}
//
//);
Route::group([
   // 'namespace' => 'administratorPanel',
    'middleware' => ['auth', 'acl'],
    'is' => 'administrator'],
    function () {
        Route::get('call/manage',array('as' => 'administratorPanel', 'uses' => 'CallController@index'));




       // Route::get('post','HomeController@index');
    });

//Route::group([
//    //'namespace' => 'moderatorPanel',
//    'middleware' => ['auth', 'acl'],
//    'is' => 'center'],
//    function () {
//        //Route::get('call/manage',array('as' => 'administratorPanel', 'uses' => 'CallController@index'));
//        Route::get('user_pages/home',array('as' => 'centerPanel', 'uses' => 'PagesController@index'));
//        //Route::get('user_pages.home', 'PagesController@index');
//    });

Route::group([
    'middleware' => ['auth', 'acl'],
    'is' => 'local'],
    function () {
        Route::get('mission/manage/local',array('as' => 'localPanel', 'uses' => 'MissionLocalController@index') );
        Route::post('mission/manage/local',array('as' => 'localPanel', 'uses' => 'MissionLocalController@update'));
    });





//Route::get('logout', 'LoginController@logout');
