<?php

use App\Http\Controllers\Painel\ProdudoController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

route::group(['namespace' => 'Site'], function () {
    Route::get('/contato', [SiteController::class, 'contato']);

    Route::get('/', [SiteController::class, 'index']);

    route::get('/categoria/{id}', [SiteController::class, 'Categoria']);

    route::get('/categoria2/{id?}', [SiteController::class, 'Categoria2']);
});

route::group(['prefix' => 'painel'], function () {
    route::group(['prefix' => 'produtos'], function () {
        Route::get('/', [ProdudoController::class, 'index'])->name('index');
        route::get('/create', [ProdudoController::class, 'create'])->name('create'); //Criar
        route::get('/edit/{id}', [ProdudoController::class, 'edit'])->name('product.edit'); //Editar View
        route::post('/update/{id}', [ProdudoController::class, 'update'])->name('product.update'); //Editar
        route::get('/delete/{id}', [ProdudoController::class, 'destroy'])->name('product.delete'); //Excluir
        route::get('/view/{id}', [ProdudoController::class, 'show'])->name('product.view');//Visualizar
        route::post('/store', [ProdudoController::class, 'store'])->name('store'); //Armazenar
    });
});
