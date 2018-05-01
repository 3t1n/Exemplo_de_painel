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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('vendedores', 'VendedoresController@vendedores_index');
Route::post('vendedores/adcionar', 'VendedoresController@registrar')->name('adcVendedor');
Route::delete('vendedores/{vendedores}', 'VendedoresController@deletar');

Route::get('usuarios', 'UsuariosController@usuarios_index');
Route::post('/usuarios/adcionar', 'UsuariosController@login')->name('adcUsuario');
Route::delete('usuarios/{usuarios}', 'UsuariosController@deletar');


Route::get('fornecedores', 'FornecedoresController@fornecedores_index');
Route::post('fornecedores/adcionar', 'FornecedoresController@registrar')->name('adcFornecedor');
Route::delete('fornecedores/{fornecedores}', 'FornecedoresController@deletar');

Route::get('produtos', 'ProdutosController@produtos_index');
