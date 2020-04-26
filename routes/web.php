<?php

Auth::routes();

// リスト一覧
Route::get('/', 'ListingsController@index')->name('listings.index');
// index以外のルート設定。アドレスを直接打ち込んでcreateなどに飛べないようにする
Route::resource('/listings', 'ListingsController')->except(['index'])->middleware('auth');


// // リスト新規画面
// Route::get('/new', 'ListingsController@new')->name('new');

// // リスト新規処理
// Route::post('/listings', 'ListingsController@store');

// // リスト更新画面
// Route::get('/listingsedit/{listing_id}', 'ListingsController@edit');

// // リスト更新処理
// Route::post('/listings/edit', 'ListingsController@update');

// // リスト削除処理
// Route::get('/listingsdelete/{listing_id}', 'ListingsController@destroy');


Route::get('listing/{listing_id}/card/new', 'CardsController@new')->name('cards.create');
Route::post('/listing/{listing_id}/card', 'CardsController@store')->name('cards.store');
// Route::post('card', 'CardsController@store')->name('cards.store');
Route::get('listing/{listing}/card/{card}/edit', 'CardsController@edit')->name('cards.edit');
Route::patch('/card/edit', 'CardsController@update')->name('cards.update');
// Route::delete('listing/{listing}/card/{card}', 'CardsController@destroy')->name('cards.destroy');


// Route::get('/home', 'HomeController@index')->name('home');