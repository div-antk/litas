<?php

Auth::routes();

// リスト一覧
Route::get('/', 'ListingsController@index');

// リスト新規画面
Route::get('/new', 'ListingsController@new')->name('new');

// リスト新規処理
Route::post('/listings', 'ListingsController@store');

// リスト更新画面
Route::get('/listingsedit/{listing_id}', 'ListingsController@edit');

// リスト更新処理
Route::post('/listings/edit', 'ListingsController@update');

// リスト削除処理
Route::get('/listingsdelete/{listing_id}', 'ListingsController@destroy');

Route::get('listing/{listing_id}/card/new', 'CardsController@new')->name('new_card');
Route::post('/listing/{listing_id}/card', 'CardsController@store');
Route::get('listing/{listing}/card/{card}/edit', 'CardsController@edit')->name('card.edit');
Route::post('/card/edit', 'CardsController@update');
Route::post('/card/edit', 'CardsController@update');

Route::delete('listing/{listing}/card/{card}', 'CardsController@destroy')->name('card.destroy');


// Route::get('/home', 'HomeController@index')->name('home');