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

Route::group(['middleware' => ['web']], function () {
  Route::get('/', function () {
          return view('welcome');
      })->middleware('guest');


Route::get('/tasksmail', 'TaskController@tasksmail');
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/task/{task}/edit', 'TaskController@edit');
Route::patch('/task/{task}', 'TaskController@update');
//Route::get('/send', 'EmailController@send');



Route::get('mail', function(){
  Mail::raw('hello this is just a test', function($message){
    $message->subject('testing')
            ->to('sphe.malgas@gmail.com')
            ->from('sphe@io.coza');
  });
  return "Email has been sent!";

});

Route::get('mail/view', function(){
  Mail::send('emails.examples', ['name' => 'Sphe'], function($message){
    $message->subject('testing')
            ->to('sphe.malgas@gmail.com')
            ->from('sphe@io.co.za');

  });
  return redirect("/tasks");
});

Route::auth();
});
