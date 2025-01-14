<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    TransactionController
};
use App\Http\Controllers\Auth\LoginController;
use App\Models\Employee;
use PHPUnit\TextUI\XmlConfiguration\Group;

use function League\Flysystem\prefixPath;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('login.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-transaksi', [DashboardController::class, 'GetDataTransaksi']);
    Route::get('/form-transaksi', [DashboardController::class, 'formTransaksi']);
    Route::get('/form-workflow', [TransactionController::class, 'formWorkFlow']);
    Route::get('/form-workflow/{id}', [TransactionController::class, 'formEditWorkFlow']);
    Route::get('/data-workflow', [TransactionController::class, 'GetDataWorkFlow']);
    Route::get('/data-approval', [TransactionController::class, 'GetDataApproval']);
    Route::get('/data-approval-by', [TransactionController::class, 'GetDataApprovalBy']);
    Route::post('/form-workflow/store', [TransactionController::class, 'storeFormWorkFlow']);
    Route::post('/input-transaksi', [TransactionController::class, 'storeFormTransaction']);
    Route::delete('/data-workflow/delete', [TransactionController::class, 'deleteWorkFlow']);

    Route::prefix('settings')->group(function () {
        Route::get('/', [TransactionController::class, 'halamanSettings'])->name('settings');
        Route::get('/data-modul', [TransactionController::class, 'getDataModul']);
    });
    Route::prefix('approval')->group(function () {
        Route::get('/', [TransactionController::class, 'halamanApproval']);
        Route::get('/data', [TransactionController::class, 'GetDataNeedsApproval']);
    });
});
