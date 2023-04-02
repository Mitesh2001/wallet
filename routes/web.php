<?php

use App\Http\Controllers\AccountDetailsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseDetailsController;
use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeDetailsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


//logout 
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.index');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});


// User Profile and Change Password
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.show');

    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.show');

    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});


// Income Category Management
Route::prefix('income')->group(function () {

    Route::get('category/view', [IncomeCategoryController::class, 'index'])->name('income.category.view');

    Route::get('category/add', [IncomeCategoryController::class, 'create'])->name('income.category.add');

    Route::post('category/store', [IncomeCategoryController::class, 'store'])->name('income.category.store');

    Route::get('category/edit/{id}', [IncomeCategoryController::class, 'edit'])->name('income.category.edit');

    Route::post('category/update/{id}', [IncomeCategoryController::class, 'update'])->name('income.category.update');

    Route::get('category/delete/{id}', [IncomeCategoryController::class, 'destroy'])->name('income.category.delete');

    //Account Management
    Route::get('account/view', [AccountDetailsController::class, 'index'])->name('account.details.view');

    Route::get('account/add', [AccountDetailsController::class, 'create'])->name('account.details.add');

    Route::post('account/store', [AccountDetailsController::class, 'store'])->name('account.details.store');

    Route::get('account/edit/{id}', [AccountDetailsController::class, 'edit'])->name('account.details.edit');

    Route::post('account/update/{id}', [AccountDetailsController::class, 'update'])->name('account.details.update');

    Route::get('account/delete/{id}', [AccountDetailsController::class, 'destroy'])->name('account.details.delete');

    //Income Management
    Route::get('view', [IncomeDetailsController::class, 'index'])->name('income.view');

    Route::get('add', [IncomeDetailsController::class, 'create'])->name('income.add');

    Route::post('store', [IncomeDetailsController::class, 'store'])->name('income.store');

    Route::get('edit/{id}', [IncomeDetailsController::class, 'edit'])->name('income.edit');

    Route::post('update/{id}', [IncomeDetailsController::class, 'update'])->name('income.update');

    Route::get('delete/{id}', [IncomeDetailsController::class, 'destroy'])->name('income.delete');
});


// Expenses Category Management
Route::prefix('expense')->group(function () {

    Route::get('category/view', [ExpensesCategoryController::class, 'index'])->name('expenses.category.view');

    Route::get('category/add', [ExpensesCategoryController::class, 'create'])->name('expenses.category.add');

    Route::post('category/store', [ExpensesCategoryController::class, 'store'])->name('expenses.category.store');

    Route::get('category/edit/{id}', [ExpensesCategoryController::class, 'edit'])->name('expenses.category.edit');

    Route::post('category/update/{id}', [ExpensesCategoryController::class, 'update'])->name('expenses.category.update');

    Route::get('category/delete/{id}', [ExpensesCategoryController::class, 'destroy'])->name('expenses.category.delete');


    //Expenses Management
    Route::get('view', [ExpenseDetailsController::class, 'index'])->name('expense.view');

    Route::get('add', [ExpenseDetailsController::class, 'create'])->name('expense.add');

    Route::post('store', [ExpenseDetailsController::class, 'store'])->name('expense.store');

    Route::get('edit/{id}', [ExpenseDetailsController::class, 'edit'])->name('expense.edit');

    Route::post('update/{id}', [ExpenseDetailsController::class, 'update'])->name('expense.update');

    Route::get('delete/{id}', [ExpenseDetailsController::class, 'destroy'])->name('expense.delete');
});

Route::prefix('report')->group(function () {
    Route::any('income-report', [ReportController::class, 'income_report'])->name('income.report');
    Route::any('expense-report', [ReportController::class, 'expense_report'])->name('expense.report');
    Route::any('full-report', [ReportController::class, 'full_report'])->name('full.report');

    //PDF
    Route::get('income-PDF', [PDFController::class, 'IncomeReportPDF'])->name('income.report.pdf');
    Route::get('expense-PDF', [PDFController::class, 'ExpenseReportPDF'])->name('expense.report.pdf');
    Route::get('full-PDF', [PDFController::class, 'FullReportPDF'])->name('full.report.pdf');

    //report Mail 
    Route::get('income/mail', [MailController::class, 'IncomeMail'])->name('income.mail');
    Route::get('expense/mail', [MailController::class, 'ExpenseMail'])->name('expense.mail');
});
