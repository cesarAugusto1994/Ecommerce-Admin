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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContatoController@index')->name('contato');

Route::get('/produtos', 'ProdutoController@lista')->name('produtos');
Route::get('/produto/{id}/{nome}', 'ProdutoController@item')->name('item');

Route::get('carrinho', 'CarrinhoController@index')->name('carrinho');
Route::post('carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho_adicionar');
Route::post('carrinho/remover', 'CarrinhoController@remover')->name('carrinho_remover');
Route::post('carrinho/destroy', 'CarrinhoController@destroy')->name('carrinho_destroy');
Route::post('carrinho/finalizar', 'PedidoController@salvar')->name('carrinho_finalizar');
Route::get('/carrinho/venda-finalizada', 'PedidoController@vendaFinalizada')->name('carrinho_venda_finalizada');

Route::get('conta/{id}', 'UsuariosController@conta')->name('conta');
Route::post('/users/editar/salvar', 'UsuariosController@salvarEdicao')->name('usuarios_salvar_edicao');

Route::get('/pedidos', 'PedidoController@index')->name('meus_pedidos');

