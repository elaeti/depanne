<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
    Route::get('user', 'AuthController@getAuthenticatedUser');
}); */

Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
});

Route::apiResource('annonces', 'AnnonceController');  
Route::apiResource('users', 'UserController');            
Route::get('/categories/annonces','CategorieController@showlisteannonce'); 
Route::get('/user', 'UserController@getuser');     
Route::get('/user/annonces', 'UserController@showlisteannoncepro');     
Route::post('liste_tache','AdminController@listetache');
Route::apiResource('interventions', 'InterventionController');
Route::apiResource('ouvriers', 'OuvrierController');
Route::apiResource('catégories', 'CategorieController');

Route::group(['middleware' => ['CheckAdmin','api'],'prefix' => 'admin'], function () {
  Route::get('users','AdminController@listeusers');
  Route::post('liste', 'AdminController@showliste');
  Route::post('create_intervention', 'AdminController@createintervention');
  Route::post('update_intervention/{user}', 'AdminController@updateIntervention');
  Route::delete('deleteuser/{user}', 'AdminController@destroyuser');
  Route::delete('deleteouvrier/{ouvrier}', 'AdminController@destroyouvrier');
  Route::get('ouvriers', 'AdminController@showouvriers'); 
  Route::get('users', 'AdminController@listeusers'); 
  Route::get('interventions', 'AdminController@listeintervention');
});

