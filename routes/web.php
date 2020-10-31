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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios','UsuariosController');
Route::resource('planes', 'PlanController');
Route::resource('antenas', 'AntenaController');
Route::resource('tecnicos', 'TecnicoController');
Route::resource('contratos','ContratosController');
Route::resource('enlaces', 'EnlacesController');
Route::resource('pagos', 'PagosController');

Route::get('contratos/suspender/{id}', [
    'as' => 'suspender', 'uses' => 'ContratosController@suspender'
]);
Route::get('contratos/regalo/{id}', [
    'as' => 'regalo', 'uses' => 'ContratosController@regalo'
]);
Route::get('contratos/cancelar/{id}', [
    'as' => 'cancelar', 'uses' => 'ContratosController@cancelar'
]);
Route::get('pagos/index/{id}', [
    'as' => 'index', 'uses' => 'PagosController@index'
]);

Route::get('students', [
    'uses' => 'TecnicoController@index',
    'as' => 'student-list'
]);
Route::get('contratos/formato/{id}', [
    'as' => 'formato', 'uses' => 'ContratosController@formato'
]);
Route::get('contratos/formatoA/{id}', [
    'as' => 'formatoA', 'uses' => 'ContratosController@formatoA'
]);
Route::get('contratos/RECIBO_PAGO_INTERNET/{id}', [
    'as' => 'RECIBO_PAGO_INTERNET', 'uses' => 'ContratosController@RECIBO_PAGO_INTERNET'
]);
Route::get('contratos/CONTRATO_DE_INTERNET/{id}', [
    'as' => 'CONTRATO_DE_INTERNET', 'uses' => 'ContratosController@CONTRATO_DE_INTERNET'
]);
Route::name('print')->get('/contratos/imprimir/{id}', ['as' =>'imprimir','uses'=>'ContratosController@imprimir']);
Route::name('print')->get('/contratos/enviar/{id}', ['as' =>'enviar','uses'=>'ContratosController@enviar']);