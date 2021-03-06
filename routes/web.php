<?php

Auth::routes();

// GoogleやSNSでのログイン
Route::prefix('login')->name('login.')->group(function (){
  Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
  Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

// GoogleやSNSでのユーザー登録
Route::prefix('register')->name('register.')->group(function (){
  Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
  Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser');
});

// ユーザー
Route::prefix('/')->name('users.')->group(function (){
  Route::get('/{name}', 'UsersController@show')->name('show');
});

// リスト一覧
Route::get('/', 'ListingsController@index')->name('listings.index');
Route::get('/listings/search', 'ListingsController@search')->name('listings.search');
// index以外のルート設定。アドレスを直接打ち込んでcreateなどに飛べないようにする
Route::resource('/listings', 'ListingsController')->except(['index'])->middleware('auth');

// いいね機能
Route::prefix('listings')->name('listings.')->group(function (){
  Route::put('/{listing}/like', 'ListingsController@like')->name('like')->middleware('auth');
  Route::delete('/{listing}/like', 'ListingsController@unlike')->name('unlike')->middleware('auth');
});

// タグ（検索）
Route::get('/tags/search', 'TagController@search')->name('tags.search');
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

// カード
Route::get('listing/{listing}/card/new', 'CardsController@new')->name('cards.create');
Route::post('/listing/{listing_id}/card', 'CardsController@store')->name('cards.store');
// Route::get('listing/{listing}/card/{card}/edit', 'CardsController@edit')->name('cards.edit');
Route::get('card/edit/{card}', 'CardsController@edit')->name('cards.edit');
Route::patch('/card/{card}', 'CardsController@update')->name('cards.update');
Route::delete('card/{card}', 'CardsController@destroy')->name('cards.destroy');

// Route::get('/home', 'HomeController@index')->name('home');