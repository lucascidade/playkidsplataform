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
    return view('site.principal');
});
Route::prefix('site')->name('site.')->group(function() {
    Route::post('/cadastrar', 'Auth\RegisterController@register')->name('cadastrar');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/sair', 'Auth\LoginController@logout')->name('sair');
    Route::get('/contato', 'SiteController@contato')->name('contato');
    Route::post('/contato', 'SiteController@contato')->name('contato');
});

Route::middleware('auth')->prefix('app')->name('app.')->group(function() {

    Route::middleware('role:admin')->group(function() {
        Route::get('/usuario/adicionar', 'UsuarioController@adicionar')->name('usuario.adicionar');
        Route::post('/usuario/cadastrar', 'UsuarioController@cadastrar')->name('usuario.cadastrar');
        Route::post('/usuario/consultar', 'UsuarioController@consultar')->name('usuario.consultar');
        Route::get('/usuario/editar/{id}', 'UsuarioController@editar')->name('usuario.editar');
        Route::put('/usuario/atualizar/{id}', 'UsuarioController@atualizar')->name('usuario.atualizar');
        Route::get('/usuario/excluir/{id}', 'UsuarioController@excluir')->name('usuario.excluir');
        Route::put('/jogos/aprovar/{id}', 'JogoController@aprovar')->name('jogos.aprovar');
        Route::put('/jogos/reprovar/{id}', 'JogoController@reprovar')->name('jogos.reprovar');
    });

    Route::middleware('role:desenvolvedor|admin')->group(function() {
        Route::get('/jogos/adicionar', 'JogoController@adicionar')->name('jogos.adicionar');
        Route::post('/jogos/cadastrar', 'JogoController@cadastrar')->name('jogos.cadastrar');
        Route::get('/jogos/relatorio', 'JogoController@relatorio')->name('jogos.relatorio');
    });

    Route::middleware(['role:desenvolvedor|admin'])->group(function() {
        Route::get('/jogos', 'JogoController@index')->name('jogos');
    });

    Route::middleware(['role:desenvolvedor|usuario_normal|admin'])->group(function() {
        Route::get('/jogos/mais-jogados', 'JogoController@maisJogados')->name('jogos.mais_jogados');
        Route::get('/jogos/{categoria}', 'JogoController@buscar')->name('jogos.buscar');
        Route::get('/jogos/jogar/{jogo}', 'JogoController@executar')->name('jogos.executar');
        Route::get('/categorias', 'CategoriaController@categorias')->name('categorias');
    });
    Route::get('/principal', 'HomeController@index')->name('principal');
    // Route::get('/jogos/editar', 'JogoController@editar')->name('jogos.editar');
    // Route::put('/jogos/atualizar', 'JogoController@editar')->name('jogos.atualizar');
});
