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

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('offers/{options?}/{limit?}/{owner?}', 'Offer@getOffers');

Route::get('offer/{id}', 'Offer@getOffer');

Route::post('offer/{id}', 'Offer@orderOffer');

Route::get('offer-terms/{id}', 'Offer@getOfferTerms');

Route::get('available-spots/{id}', 'Offer@getOfferTermAvailableSpots');
