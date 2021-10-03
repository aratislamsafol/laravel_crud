<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Category
Route::get('/all/category','CategoryController@AllCat')->name('All.Store');
// Category Add Route
Route::post('/Add/Category','CategoryController@AddCat')->name('store.add');
// Category Update Catch Data
Route::get('/Category/item/edit/{id}','CategoryController@EditCat');
// Category Post Data
Route::post('/Category/item/edit/{id}','CategoryController@UpdateCat');
// Category Item Delete
Route::get('/Category/delete/{id}','CategoryController@SoftDelete');
// Category Item Restored
Route::get('/Category/restore/{id}','CategoryController@Restore');
// Category Item Permanently Delete
Route::get('Category/p_delete/{id}','CategoryController@P_Delete');
// Cate

