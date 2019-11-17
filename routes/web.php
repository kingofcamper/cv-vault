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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');


Route::get('cvs','CvController@index');


Route::get('cvs/create','CvController@create');
Route::get('cvs/{id}/edit','CvController@edit');

Route::post('cvs','CvController@store');

Route::put('cvs/{id}','CvController@update');

Route::delete('cvs/{id}','CvController@destroy');*/

Route::resource('cvs','CvController');
//for experience
Route::get('/getdata/{id}','CvController@getData');
Route::post('/addexperience','CvController@addExperience');
Route::put('/updateexperience','CvController@updateExperience');
Route::delete('/deleteexperience/{id}','CvController@deleteExperience');

//for formation
Route::post('/addformation','CvController@addFormation');
Route::put('/updateformation','CvController@updateFormation');
Route::delete('/deleteformation/{id}','CvController@deleteFormation');

//for competence
Route::post('/addcompetence','CvController@addCompetence');
Route::put('/updatecompetence','CvController@updateCompetence');
Route::delete('/deletecompetence/{id}','CvController@deleteCompetence');

//for projet
Route::post('/addprojet','CvController@addProjet');
Route::put('/updateprojet','CvController@updateProjet');
Route::delete('/deleteprojet/{id}','CvController@deleteProjet');
