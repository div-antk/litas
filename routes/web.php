<?php

Auth::routes();

// ユーザー
Route::prefix('users')->name('users.')->group(function (){
  Route::get('/{name}', 'UsersController@show')->name('show');
});

// リスト一覧
Route::get('/', 'ListingsController@index')->name('listings.index');
// index以外のルート設定。アドレスを直接打ち込んでcreateなどに飛べないようにする
Route::resource('/listings', 'ListingsController')->except(['index'])->middleware('auth');

// カード
Route::get('listing/{listing}/card/new', 'CardsController@new')->name('cards.create');
Route::post('/listing/{listing_id}/card', 'CardsController@store')->name('cards.store');
Route::get('listing/{listing}/card/{card}/edit', 'CardsController@edit')->name('cards.edit');
Route::patch('/card/{card}', 'CardsController@update')->name('cards.update');
Route::delete('listing/{listing}/card/{card}', 'CardsController@destroy')->name('cards.destroy');

// Route::get('/home', 'HomeController@index')->name('home');