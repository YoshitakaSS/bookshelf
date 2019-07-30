<?php
// use Symfony\Component\Routing\Route;
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
/**
 * BookShelf（仮）の作成
 */
// トップ画面
Route::get('/', 'TopController@indexAction');

// トップ画面　サジェスト　Ajax用
Route::get('/book/suggest', 'TopController@suggestAction');

// トップ画面　ソート
Route::get('/list/sort', 'TopController@sortAction');

// 概要画面
Route::get('/about', 'TopController@aboutAction');

// 一覧画面
Route::get('/booklist', 'ListController@indexAction');

// 詳細画面
Route::get('/detail/book/{book_id}', 'DetailController@indexAction');

// 詳細画面　コメント登録機能
Route::post('/detail/regist/book/{book_id}/comment', 'DetailController@registCommentAction');

// レビュー投稿画面
Route::get('/regist/book', 'BookController@indexAction');

// レビュー投稿画面　Ajax用
Route::get('/api/books-list', 'BookController@booklistAction');

// レビュー投稿画面　登録機能
Route::post('/regist/book/comment', 'BookController@registAction');

