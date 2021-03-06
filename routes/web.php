<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', [
  'uses' => 'HomeController@index',
  'middleware' => 'auth'
]);
$app->post('/deploy', [
  'uses' => 'HomeController@deploy',
]);


$app->get('/coming-soon', function () {
  return view('coming-soon');
});

