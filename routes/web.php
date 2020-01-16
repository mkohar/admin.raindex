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

// Route::get('/', function () {
//    return view('welcome');
// });


Route::group(['middleware' => 'admin'], function() {
   // Dashboard
   Route::get('/', 'AdminController@dashboard')->name('dashboard');

   // About Us
   Route::get('/about-us', 'Profile\AboutUsController@index')->name('aboutUs');
   Route::put('/about-us/update/{id}', 'Profile\AboutUsController@updateAbout')->name('aboutUs.update');
   Route::put('/about-us/update/vission/{id}', 'Profile\AboutUsController@updateVission')->name('vission.update');
   Route::put('/about-us/update/mission/{id}', 'Profile\AboutUsController@updateMission')->name('mission.update');

   // Portfolio
   Route::get('/portfolio', 'Profile\PortfolioController@index')->name('portfolio');
   Route::post('/portfolio/store', 'Profile\PortfolioController@store')->name('portfolio.store');

   // Project
   Route::get('/project', 'Project\ProjectController@index')->name('project');
   Route::post('/project/store', 'Project\ProjectController@store')->name('project.store');
   Route::get('/project/{id}', 'Project\ProjectController@single')->name('project.single');
   Route::get('/project/{id}/discussion', 'Project\DiscussionController@getDiscussion')->name('project.single.discussion');
   Route::post('/project/{id}/discussion', 'Project\DiscussionController@postDiscussion')->name('project.single.discussion.post');
   Route::get('/project/{id}/users', 'Project\DiscussionController@postDiscussion')->name('project.single.users');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
