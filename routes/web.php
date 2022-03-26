<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ProductController;
use App\Http\Livewire\BuysController;
use App\Http\Livewire\ReporteInvoices;
use App\Http\Controllers\ExportController;


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



//Route Hooks - Do not delete//
Route::middleware(['auth'])->group(function(){
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('product', ProductController::class);
    Route::get('buys', BuysController::class);
    Route::get('invoices', ReporteInvoices::class);
    Route::get('reporte/pdf/{buysType}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
    Route::get('reporte/pdf/{buysType}', [ExportController::class, 'reportPDF']);
});
    