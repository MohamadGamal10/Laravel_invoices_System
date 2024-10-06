<?php

use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view( 'auth.login');
});


Auth::routes();
// Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('invoices' ,InvoicesController::class);
Route::get('/InvoicesDetails/{id}' ,[InvoicesDetailsController::class , 'edit']);
Route::post('delete_file', [InvoicesDetailsController::class , 'edit'])->name('delete_file');
Route::get('/Status_show/{id}', [InvoicesController::class , 'show' ])->name('Status_show');
Route::get('/Status_Update/{id}', [InvoicesController::class , 'Status_Update' ])->name('Status_Update');

Route::get('/edit_invoice/{id}', [InvoicesController::class , 'edit']);

Route::post('/Status_Update/{id}', [InvoicesController::class , 'Status_Update'])->name('Status_Update');

Route::resource('Archive', InvoiceAchiveController::class );

Route::get('Print_invoice/{id}',[InvoicesController::class,  'Print_invoice']);

Route::get('Invoice_Paid',[InvoicesController::class , 'Invoice_Paid']);

Route::get('Invoice_UnPaid',[InvoicesController::class , 'Invoice_UnPaid']);

Route::get('Invoice_Partial',[InvoicesController::class , 'Invoice_Partial']);

Route::get('export_invoices', [InvoicesController::class, 'export']);

Route::get('/section/{id}' ,[InvoicesController::class , 'getproducts']);
Route::resource('sections',SectionsController::class);
Route::resource('products',ProductsController::class);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('products','ProductController');
});




Route::get('/{page}', 'App\Http\Controllers\AdminController@index');




