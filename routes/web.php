<?php


$this ->group(['middleware' => ['auth'], 'namespace' => 'produto'], function(){
   $this->get('produto', 'ProdutosController@index');
    
});

Auth::routes();
Route::get('/', function () {
  return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produto', 'ProdutosController@index')->name('produto');
Route::get('/produto/incluir', 'ProdutosController@create')->name('incluir');
Route::get('/cliente/incluir', 'ClienteController@create')->name('cadastrar');
Route::get('/cliente/exibir', 'ClienteController@index')->name('exibir'); 
Route::resource('product','ProdutosController');
Route::resource('cliente','ClienteController');
Route::resource('pdv','PdvController'); 
Route::resource('OS','OsController');
Route::resource('registro', 'RegistroController');
Route::resource('edit-registro-item', 'EditRegistro');
$this->get('/pdv','PdvController@show')->name('show');
$this->get('/pdv-alter','PdvController@truncate')->name('truncate');
$this->post('/pdv/cliente','PdvController@searchCliente')->name('search.cliente');
Route::get('/registro', 'RegistroController@index')->name('registro');
Route::post('/registro', 'RegistroController@calcular')->name('calcular');
Route::get('/registro-option', 'RegistroController@taxa')->name('registro.taxa');
Route::post('/registro-option', 'RegistroController@destroy')->name('destroy');
Route::post('/registro-register', 'RegistroController@register')->name('register');
Route::post('/OS','OsController@save')->name('OS.save');
Route::get('/OS-show','OsController@show')->name('os.show');
Route::get('/vendas', 'RegistroController@show')->name('vendas');
Route::get('/edit-registro-item', 'RegistroController@alter')->name('alter');
Route::post('/edit-registro', 'RegistroController@remove')->name('remove');
Route::get('/imprimir', 'PdvController@imprimir')->name('imprimir');
Route::get('/imprimir-os', 'OsController@imprimir')->name('imprimir.os');



