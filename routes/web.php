<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AtivosController;
use App\Http\Controllers\ListaAtivosController;
use App\Http\Controllers\ImpostoRendaController;
use App\Http\Controllers\MovimentoAtivosController;
use App\Http\Controllers\DashboardController;


Route::resource('ativos', AtivosController::class);
Route::resource('user', UserController::class);
Route::resource('lista', ListaAtivosController::class);
Route::resource('imposto', ImpostoRendaController::class);
Route::resource('movimento', MovimentoAtivosController::class);
Route::resource('dashboard', DashboardController::class);

/*dashboard*/

Route::get('/dashboard', [DashboardController::class, 'dash'])->name('principal.dashboard');
Route::get('/graficoPorcentagem', [DashboardController::class, 'graficoPorcentagem'])->name('principal.graficoPorcentagem');
Route::get('/graficoTotal', [DashboardController::class, 'graficoTotal'])->name('principal.graficoTotal');

/*opcoes*/

Route::get('/opcoes', [ImpostoRendaController::class, 'opcoes'])->name('imposto.opcoes');
Route::get('/opcoes-move', [MovimentoAtivosController::class, 'opcoesmove'])->name('movimento.opcoesmove');

/*ativos*/

Route::get('/ativos/show', [AtivosController::class, 'show'])->name('ativos.show');

Route::get('/ativos/{id}/edit', [AtivosController::class, 'edit'])->name('ativos.edit');
Route::delete('/ativos/{id}', [AtivosController::class, 'destroy'])->name('ativos.destroy');

/*busca*/

Route::get('/buscar-ativos', [AtivosController::class, 'buscarativos']);

/*PDF*/
Route::get('/export-MovimentoAtivosPdf/{data_ini}/{data_fi}/{tip}', [MovimentoAtivosController::class, 'exportMovimentoAtivosPdf'])->name('movimento.exportMovimentoAtivosPdf');
Route::get('/export-IrPdf/{data_ini}/{data_fi}/{tip}', [ImpostoRendaController::class, 'exportIrpdfPdf'])->name('imposto.exportIrpdfPdf');

/*Excel*/

Route::get('/export-movimentos/{data_ini}/{data_fi}/{tip}', [MovimentoAtivosController::class, 'exportMovimentoAtivos'])->name('movimento.exportMovimentoAtivos');
Route::get('/exportAtivos/{data_ini}/{data_fi}/{tip}', [ImpostoRendaController::class, 'exportAtivos'])->name('imposto.exportAtivos');

/*User*/

Route::get('/cadastro', [UserController::class, 'create'])->name('user.create');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/', [UserController::class, 'index'])->name('user.index');
