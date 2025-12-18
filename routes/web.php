<?php

use App\Http\Controllers\CountController;
use Illuminate\Support\Facades\Route;

Route::post('savebd', [CountController::class, 'store'])->name('savecount');

Route::get('contagens', [CountController::class, 'create'])->name('counts');

Route::get('contagens/lista', [CountController::class, 'index'])->name('listcount');

Route::get('contagens/delete/{id}', [CountController::class, 'destroy'])->name('deletecount');

Route::get('contagens/update/{id}', [CountController::class, 'update'])->name('updatecount');

Route::post('contagens/update_save/{id}', [CountController::class, 'updatesave'])->name('updatesavecount');
