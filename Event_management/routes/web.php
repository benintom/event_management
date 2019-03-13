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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth.register', 'auth.RegisterController@showregistrationform');
//Guest homepage
Route::get('/', 'guestcontroller@eventviews');

//organization Home Page
Route::get('/orghome','organization@index');
//org profile
Route::get('/orgprofile', 'organization@state');
Route::post('/orgprofile/submit','organization@store');
Route::get('dist/get/{id}','organization@getDist');
//test with inculde

Route::get('/orgview','organization@orgview');


//org profile view
Route::get('/orgprofileview','organization@orgprofile');

//org add events
Route::get('/events','eventcontroller@index');
Route::post('/events/submit','eventcontroller@store');

//org list events
Route::get('/list','eventcontroller@levents');

//org edit events
Route::get('/eventedit/{id}','eventcontroller@editevent');
//org update events
Route::post('/eventupdate/{id}','eventcontroller@eventupdate');
//org delete
Route::get('/eventdelete/{id}', 'eventcontroller@catdelete');

//org ADD TICKET

Route::get('/ticket','ticketcontroller@index');
Route::post('/ticket/submit','ticketcontroller@store');

//org list ticket
Route::get('/listticket','ticketcontroller@levents');
//org ticketedit
Route::get('/ticketedit/{id}','ticketcontroller@editticket');
//org ticketupdate
Route::post('/ticketupdate/{id}','ticketcontroller@ticketupdate');
//org ticketdelete
Route::get('/ticketdelete/{id}', 'ticketcontroller@ticketdelete');


//PARTICIPANTS homepage

Route::get('/phome','usercontroller@index');
//event view for participants
Route::get('/eventlist','usercontroller@eventviews');
//single event
Route::get('/view/{id}','usercontroller@singleviews');
//buy ticket
Route::post('/buy/{id}','usercontroller@tickets');
