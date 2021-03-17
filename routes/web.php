<?php

use Illuminate\Support\Facades\Route;

// トップ
Route::get('/','Web\CommonController@showIndex')
->name('web.index');

Route::get('/posts/{post}','Web\CommonController@showPost')
->name('web.posts.showPost');

/************************************************/

// ユーザー
Route::prefix('user')->group(function(){
  // ユーザーログイン
  Route::get('login','User\Auth\LoginController@showLoginForm');
  Route::post('login','User\Auth\LoginController@authenticate')->name('user.login');
  Route::get('logout','User\Auth\LoginController@logout')->name('user.logout');

  // ユーザー登録
  Route::get('create','User\Auth\RegisterController@create')->name('user.create');
  Route::post('confirm','User\Auth\RegisterController@confirm')->name('user.confirm');
  Route::post('store','User\Auth\RegisterController@store')->name('user.store');
});


/************************************************/

// ユーザーダッシュボード
Route::prefix('home')->group(function(){

  Route::get('/','User\Home\HomeController@index')->name('user.home.index');

   // ユーザー情報表示・変更
  Route::get('show','User\Home\HomeController@show')->name('user.home.show');
  Route::get('edit','User\Home\HomeController@edit')->name('user.home.edit');
  Route::post('update','User\Home\HomeController@update')->name('user.home.update');

  // ユーザー退会
  Route::get('destory','User\Home\HomeController@destory')->name('user.home.destory');
  Route::post('destory','User\Home\HomeController@delete')->name('user.home.delete');

  // 決済ページ
  Route::get('payment', 'User\Home\PaymentController@index')->name('user.payment.index');
  Route::get('payment/create', 'User\Home\PaymentController@create')->name('user.payment.create');
  Route::post('payment/store', 'User\Home\PaymentController@store')->name('user.payment.store');

});

/************************************************/

// ホスト
Route::prefix('host')->group(function(){

  // ホストログイン
  Route::get('login','Host\Auth\LoginController@showLoginForm');
  Route::post('login','Host\Auth\LoginController@authenticate')->name('host.login');
  Route::get('logout','Host\Auth\LoginController@logout')->name('host.logout');

  // ホスト登録
  Route::get('create','Host\Auth\RegisterController@create')->name('host.create');
  Route::post('confirm','Host\Auth\RegisterController@confirm')->name('host.confirm');
  Route::post('store','Host\Auth\RegisterController@store')->name('host.store');

  // ホストダッシュボード
  Route::get('/home','Host\Home\HomeController@index')->name('host.home.index');

});

/************************************************/




















// ホストダッシュボード・メニュー
// Route::get('host/dashboard','Host\Home\HomeController@show')->name('host.home.show');
// Route::get('host/post-list','Host\Post\PostController@show')->name('host.post.show');
// Route::get('host/member-list','Host\Member\MemberController@show')->name('host.member.show');
// Route::get('host/fee-list','Host\Fee\FeeController@show')->name('host.fee.show');
// Route::get('host/logout','Host\Auth\LoginController@logout')->name('host.auth.logout');








// イベント投稿
// Route::get('post/{post}','Host\Post\PostController@showRegistrationForm')->name('post.show');

Route::get('post/{post}/edit','Host\Post\PostController@edit')->name('host.post.edit');

Route::patch('post/{post}','Host\Post\PostController@updatePost')->name('host.post.update');






Route::get('host/post-register','Host\Post\PostController@showRegistrationForm')->name('host.post.showRegister');
Route::post('host/post-confirm','Host\Post\PostController@getRegistration')->name('host.post.confirm');



















// イベント
Route::get('events/event1','Event\EventController@showEvent1')->name('event.event1');















// ホストダッシュボード/memberlistの詳細
Route::get('host/member/id={id}','Host\HomeController@showMember')->name('host.member');
// ホストダッシュボード/member修正

Route::get('host/member/edit/{id}','Host\HomeController@editMember')->name('host.editMember');
Route::post('host/member/{user:user_id}','Host\HomeController@updateMember')->name('host.updateMember');
