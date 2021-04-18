<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect("/blog");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/board/friendBoard','BoardController@friendBoard');
Route::put('/board/edit-board','BoardController@updateBoard');
Route::post('/board/add-board','BoardController@addBoard');
Route::get('/board/writeboard','BoardController@getWriteboard');
Route::put('/board/delete-board','BoardController@deleteBoard');
Route::get('/board/{friend_id}','BoardController@index');
Route::resource('/board','BoardController');

Route::put('/blog/deleteMessage','BlogController@deleteMessage');
Route::put('/blog/deleteNewsMessage','BlogController@deleteNewsMessage');
Route::get('/blog/get-friend-album-list','BlogController@getFriendAlbumList');
Route::post('/blog/sendMessage','BlogController@sendMessage');
Route::put('/blog/deleteFriend','BlogController@deleteFriend');
Route::get('/blog/friend-album/{id}','BlogController@friendAlbum');
Route::post('/blog/completefriend','BlogController@completeFriend');
Route::post('/blog/refusefriend','BlogController@refuseFriend');
Route::post('/blog/add-friends','BlogController@addFriend');
Route::post('/blog/album-recommend','BlogController@likeAlbum');
Route::put('/blog/clickopen','BlogController@clickOpen');
Route::put('/blog/clickhide','BlogController@clickHide');
Route::post('/blog/worse-comment','BlogController@worseComment');
Route::post('/blog/like-comment','BlogController@likeComment');
Route::get('/blog/modify_mypage','BlogController@getmodifyMypage');
Route::get('/blog/mypage','BlogController@getMypage');
Route::get('/blog/comment-sample','BlogController@getCommentSample');
Route::put('/blog/delete-comment','BlogController@deleteComment');
Route::post('/blog/add-comment','BlogController@addComment');
Route::get('/blog/addalbum','BlogController@getAddalbum');
Route::get('/blog/album','BlogController@getAlbum');
Route::get('/blog/friend','BlogController@getFriend');
Route::get('/blog/messages','BlogController@getMessages');
Route::get('/blog/news','BlogController@getNews');
Route::get('/blog/addfriend','BlogController@getAddfriend');
Route::get('/blog/get-album-list','BlogController@getAlbumList');
Route::post('/blog/add-photo','BlogController@addPhoto');
Route::put('/blog/update-profile','BlogController@updateProfile');
Route::put('/blog/update-photo','BlogController@updatePhoto');
Route::put('/blog/delete-photo','BlogController@deletePhoto');
Route::put('/blog/update-photo-type','BlogController@updatePhotoType');
Route::get('/blog/albumdetail','BlogController@getalbumDetail');
Route::resource('/blog','BlogController');


Route::post('/upload/upload-photo', 'UploadController@uploadPhoto');
Route::resource('/upload','UploadController');