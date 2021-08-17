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
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('cambiar', function () {
    return view('cambiar');
});
Route::get('largadistancia', function () {
    return view('largadistancia');
});
Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('pagos/historial', 'PagosController@historial');
Route::get('pagos/history', 'PagosController@history');
Route::resource('usuarios','UsuariosController');
Route::resource('planes', 'PlanController');
Route::resource('antenas', 'AntenaController');
Route::resource('tecnicos', 'TecnicoController');
Route::resource('contratos','ContratosController');
Route::resource('enlaces', 'EnlacesController');
Route::resource('pagos', 'PagosController');
Route::resource('mensajes', 'MensajesController');
Route::resource('ingresos','IngresoController');
Route::resource('bancos','BancoController');
Route::resource('cibers','CiberController');
Route::resource('mikrotiks','MikrotikController');

Route::get('contratos/suspender/{id}', [
    'as' => 'suspender', 'uses' => 'ContratosController@suspender'
]);
Route::get('/buscar', [
    'as' => 'buscar', 'uses' => 'IngresoController@buscar'
]);
Route::get('/mkbuscar', [
    'as' => 'mkbuscar', 'uses' => 'MikrotikController@mkbuscar'
]);
Route::get('/consultar', [
    'as' => 'consultar', 'uses' => 'BancoController@consultar'
]);
Route::get('contratos/buscar/', [
    'as' => 'buscar', 'uses' => 'ContratosController@buscar'
]);
Route::get('contratos/regalo/{id}', [
    'as' => 'regalo', 'uses' => 'ContratosController@regalo'
]);
Route::get('contratos/cancelar/{id}', [
    'as' => 'cancelar', 'uses' => 'ContratosController@cancelar'
]);
Route::get('Pagos/detalles/{id_user}', [
    'as' => 'detalles', 'uses' => 'PagosController@detalles'
]);
Route::get('pagos/index/{id}', [
    'as' => 'index', 'uses' => 'PagosController@index'
]);
Route::get('students', [
    'uses' => 'TecnicoController@index',
    'as' => 'student-list'
]);
Route::get('mikrotiks/activar/{id}', [
    'as' => 'activar', 'uses' => 'MikrotikController@activar'
]);
Route::get('mikrotiks/mklimites', [
    'as' => 'mklimites', 'uses' => 'MikrotikController@mklimites'
]);
Route::get('mikrotiks/desactivar/{id}', [
    'as' => 'desactivar', 'uses' => 'MikrotikController@desactivar'
]);
Route::get('contratos/formato/{id}', [
    'as' => 'formato', 'uses' => 'ContratosController@formato'
]);
Route::get('contratos/formatoA/{id}', [
    'as' => 'formatoA', 'uses' => 'ContratosController@formatoA'
]);
Route::get('ingresos/formatoc/{fechauno}/{fechados}', [
    'as' => 'formatoc', 'uses' => 'IngresoController@formatoc'
]);
Route::get('contratos/RECIBO_PAGO_INTERNET/{id}', [
    'as' => 'RECIBO_PAGO_INTERNET', 'uses' => 'ContratosController@RECIBO_PAGO_INTERNET'
]);
Route::get('contratos/CONTRATO_DE_INTERNET/{id}', [
    'as' => 'CONTRATO_DE_INTERNET', 'uses' => 'ContratosController@CONTRATO_DE_INTERNET'
]);
Route::get('ingresos/RESUMEN/{fechauno}/{fechados}', [
    'as' => 'RESUMEN', 'uses' => 'IngresoController@RESUMEN'
]);
Route::name('print')->get('/contratos/imprimir/{id}', ['as' =>'imprimir','uses'=>'ContratosController@imprimir']);
Route::name('print')->get('/contratos/enviar/{id}', ['as' =>'enviar','uses'=>'ContratosController@enviar']);
Route::name('print')->get('/ingresos/imprimirresumem/{fechauno}/{fechados}', ['as' =>'imprimirresumen','uses'=>'IngresoController@imprimirresumen']);