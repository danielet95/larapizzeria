<?php

Use App\User;

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
    return redirect()->to('login');
});

Auth::routes();

if (!User::where("role_id","=",1)->exists())
{
	Route::get('register-merchant', 'Auth\RegisterController@showMerchantRegistrationForm')->name('register_merchant');
	Route::post('register-merchant', 'Auth\RegisterController@registerMerchant')->name('store_merchant');
}

//Merchant routes
Route::group(["middleware" => ['auth']], function () {
	
	Route::resource('orders', 'OrderController');

	Route::group(["middleware" => ['merchant']], function () {
		Route::get('/home-merchant', function() {
			return redirect()->route('products.index');
		})->name('merchant_home');
		Route::resource('products', 'ProductController');
	});

	//Client routes
	Route::group(["middleware" => ['client']], function () {
		Route::get('/home', 'ClientController@index')->name('home');
		Route::get('/products/add-to-cart/{product}', 'ProductController@addToCart')->name('products.addToCart');
		Route::get('/checkout', 'ClientController@goToCheckout')->name('clients.goToCheckout');
		Route::get('/buy-now', 'ClientController@buyNow')->name('clients.buyNow');
	});

});