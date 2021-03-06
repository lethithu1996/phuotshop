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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('logout', ['as' => 'logout', function () {
    Session::forget('access_token');
    Auth::logout();
    Session::flush();
    return Redirect::to('/login')->with('flash_notice', 'You have successfully logged out!');
}]);


Route::group(['middleware' =>'admin'], function () {
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/typeproduct','TypeProductController@index')->name('typeproduct');
	Route::get('/typeproduct/destroy/{id}','TypeProductController@destroy');
	Route::get('/typeproduct/update/{id}','TypeProductController@show');
	Route::post('/typeproduct/update','TypeProductController@update')->name('updatetypeproduct');
	Route::get('/typeproduct/create','TypeProductController@getStore');
	Route::post('/typeproduct/create','TypeProductController@store');

	Route::get('/company','CompanyController@index')->name('company');
	Route::get('/company/destroy/{id}','CompanyController@destroy');
	Route::get('/company/update/{id}','CompanyController@show');
	Route::post('/company/update','CompanyController@update')->name('companyupdate');
	Route::get('/company/create','CompanyController@getStore');
	Route::post('/company/create','CompanyController@store');

	Route::get('/user','UserController@index')->name('user');
	Route::get('/user/destroy/{id}','UserController@destroy');
	Route::get('/user/update/{id}','UserController@show');
	Route::post('/user/update','UserController@update')->name('userupdate');
	Route::get('/user/create','UserController@getStore');
	Route::post('/user/create','UserController@store');

	Route::get('admin-acount', function(){
			return view('user.myacount');
		})->name('admin-acount');
	Route::post('admin/change-password','UserController@adminchangepass');

	Route::get('/size','SizeController@index')->name('size');
	Route::get('/size/destroy/{id}','SizeController@destroy');
	Route::get('/size/update/{id}','SizeController@show');
	Route::post('/size/update','SizeController@update')->name('sizeupdate');
	Route::get('/size/create','SizeController@getStore');
	Route::post('/size/create','SizeController@store');

	Route::get('/color', 'ColorController@index')->name('color');
	Route::get('/color/destroy/{id}', 'ColorController@destroy');
	Route::get('/color/update/{id}', 'ColorController@show');
	Route::post('/color/update', 'ColorController@update')->name('colorupdate');
	Route::get('/color/create', 'ColorController@getStore');
	Route::post('/color/create', 'ColorController@store');

	Route::get('/product', 'ProductController@index')->name('product');
	Route::get('/product/destroy/{id}', 'ProductController@destroy');
	Route::get('/product/update/{id}', 'ProductController@show');
	Route::get('/product/show/{id}','ProductController@detail');
	Route::post('/product/update', 'ProductController@update')->name('productupdate');
	Route::get('/product/create', 'ProductController@getStore');
	Route::post('/product/create', 'ProductController@store');
	Route::get('/chart',['as'=>'admin-chart','uses'=>'ReportController@chart']);
	Route::get('customer',['as'=>'customer','uses'=>'UserController@listcustomer']);
	Route::post('feedback','PagesController@feedback');

	Route::get('/bill', 'BillController@index')->name('bill');
	Route::get('/bill-destroy/{id}', 'BillController@destroy');
	Route::get('/bill-update/{id}', 'BillController@show');
	Route::post('/bill-update', 'BillController@update')->name('billupdate');
	Route::get('bill/create', 'BillController@getStore');
	Route::post('/bill/create', 'BillController@store');
	Route::get('bill-detail/{id}','BillController@detail');
	Route::get('/report', 'ReportController@overview')->name('report');

	Route::get('/property','PropertyController@index')->name('property');
	Route::get('/property/create','PropertyController@getStore');
	Route::post('property/create','PropertyController@store');
	Route::get('/property/destroy/{product_id}/{size_id}/{color_id}', 'PropertyController@destroy');

	Route::get('/feedback','FeedbackController@index')->name('feedback');
	Route::get('/feedback/destroy/{id}', 'FeedbackController@destroy');

 });
Route::get('user-acount','UserController@detail')->name('user-acount');
Route::get('user-change-password', 'UserController@getchangePass');
Route::post('user/change-password', 'UserController@changepass');
Route::get('/', 'PagesController@showHome');
Route::get('/topproduct', 'ProductController@productTop');
Route::get('product/detail/{id}', 'PagesController@showDetail');
Route::get('/typeproduct/{id}', 'PagesController@typeProduct');
Route::post('search','HomeController@search');
Route::get('gio-hang', ['as' => 'getcart', 'uses' => 'PagesController@getcart']);
Route::get('gio-hang/addcart/{id}', 'PagesController@addcart');
Route::get('gio-hang/update/{id}/{qty}-{dk}', ['as' => 'getupdatecart', 'uses' => 'PagesController@getupdatecart']);
Route::get('gio-hang/delete/{id}', ['as' => 'getdeletecart', 'uses' => 'PagesController@getdeletecart']);
Route::get('gio-hang/xoa', ['as' => 'getempty', 'uses' => 'PagesController@xoa']);
Route::post('gio-hang/addtocart','PagesController@addtocart');
Route::get('dat-hang', ['as' => 'getoder', 'uses' => 'PagesController@getoder']);
Route::post('dat-hang', ['as' => 'postoder', 'uses' => 'PagesController@postoder']);
Route::post('dat-hang-shop','PagesController@payment');
Route::get('contact', 'PagesController@contact');
Route::get('test', 'PagesController@showProductSale');
Route::post('search', 'PagesController@search');
Route::get('list-sale','PagesController@listsale');
Route::get('/getMail', function () {
    return view('form');
});
Route::post('/reset-pass','Auth\ResetPasswordController@resetpass');

Route::get('test/bill','BillController@test');