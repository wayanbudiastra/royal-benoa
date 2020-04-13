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
    return view('frontend.index');
});

Route::get('/loginadmin', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['middleware'=> ['auth','checkRole:admin']],function(){
   
   Route::get('/inventorymaster', 'DashboardController@inventorymaster')->name('inventorymaster');

    Route::get('/pasien','PasienController@index');
    Route::get('/pasien/create','PasienController@create');
    Route::get('/pasien/createreg', 'PasienController@createreg');
    Route::post('/pasien/do_create', 'PasienController@do_create');
    Route::post('/pasien/do_createreg', 'PasienController@do_createreg');
    Route::get('/pasien/{id}/edit','PasienController@edit');                      
    Route::post('/pasien/{id}/do_edit','PasienController@do_edit');
    Route::get('/pasien/cari', 'PasienController@cari');
    Route::get('/pasien/{id}/profile','PasienController@profile');

    Route::get('/katagori','KatagoriController@index');
    Route::get('/katagori/create','KatagoriController@create');
    Route::post('/katagori/do_create', 'KatagoriController@do_create');
    Route::get('/katagori/{id}/edit','KatagoriController@edit');
    Route::post('/katagori/{id}/update', 'KatagoriController@update');

    Route::get('/sub_katagori','Sub_katagoriController@index');
    Route::get('/sub_katagori/create','Sub_katagoriController@create');
    Route::post('/sub_katagori/do_create', 'Sub_katagoriController@do_create');
    Route::get('/sub_katagori/{id}/edit','Sub_katagoriController@edit');
    Route::post('/sub_katagori/{id}/update', 'Sub_katagoriController@update');

    Route::get('/suplier','SuplierController@index');
    Route::get('/suplier/create','SuplierController@create');
    Route::post('/suplier/do_create', 'SuplierController@do_create');
    Route::get('/suplier/{id}/edit','SuplierController@edit');
    Route::post('/suplier/{id}/update', 'SuplierController@update');

    Route::get('/golongan','GolonganController@index');
    Route::get('/golongan/create','GolonganController@create');
    Route::post('/golongan/do_create', 'GolonganController@do_create');
    Route::get('/golongan/{id}/edit','GolonganController@edit');
    Route::post('/golongan/{id}/update', 'GolonganController@update');

    Route::get('/produk','ProdukController@index');
    Route::get('/produk/create','ProdukController@create');
    Route::post('/produk/do_create', 'ProdukController@do_create');
    Route::get('/produk/{id}/edit','ProdukController@edit');
    Route::post('/produk/{id}/update', 'ProdukController@update');
});

Route::get('getdatapasien',[
    'uses' => 'PasienController@getdatapasien',
    'as' => 'ajax.get.data.pasien'
]);
Route::get('getdatakataori',[
    'uses' => 'Katagori@getdatakataori',
    'as' => 'ajax.get.data.katagori'
]);

Route::get('/ajax-subkatagori', 'ProdukController@ajax_katagori');