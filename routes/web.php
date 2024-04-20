<?php

use App\Http\Controllers\CompanyController;
use App\Http\Middleware\LoginAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::prefix('/admin')->group(function () {

Route::get('/', [AdminController::class, 'index'])->name('admin.index');

// List country
Route::get('/country', [CountryController::class, 'index'])->name('admin.country');
Route::get('/country_create', [CountryController::class, 'create'])->name('admin.country_create');
Route::post('/country_create', [CountryController::class, 'store'])->name('admin.country_store');
Route::get('/country_update_show/{id}', [CountryController::class, 'edit'])->name('admin.country_edit');
Route::post('/country_update_show/{id}', [CountryController::class, 'update'])->name('admin.country_update');
Route::get('/country_delete/{id}', [CountryController::class, 'destroy'])->name('admin.country_delete');
// Route::get('/country_list/{id}', [CountryController::class, 'country_list'])->name('admin.country_list');


//List role
Route::get('/role', [RoleController::class, 'index'])->name('admin.role');
Route::get('/role_create', [RoleController::class, 'create'])->name('admin.role_create');
Route::post('/role_create', [RoleController::class, 'store'])->name('admin.role_store');
Route::get('/role_update_show/{id}', [RoleController::class, 'edit'])->name('admin.role_edit');
Route::post('/role_update_show/{id}', [RoleController::class, 'update'])->name('admin.role_update');
Route::get('/role_delete/{id}', [RoleController::class, 'destroy'])->name('admin.role_delete');

// List user
Route::get('/user', [UserController::class, 'index'])->name('admin.user');
Route::get('/user_create', [UserController::class, 'create'])->name('admin.user_create');
Route::post('/user_create', [UserController::class, 'store'])->name('admin.user_store');
\Route::get('/change_user/{id}', [UserController::class, 'edit'])->name('admin.user_edit');
Route::post('/change_user/{id}', [UserController::class, 'update'])->name('admin.user_update');
Route::get('/user_delete/{id}', [UserController::class, 'destroy'])->name('admin.user_delete');

// List company
Route::get('/company', [CompanyController::class, 'index'])->name('admin.company');
Route::get('/company_create', [CompanyController::class, 'create'])->name('admin.company_create');
Route::post('/company_create', [CompanyController::class, 'store'])->name('admin.company_store');
Route::get('/company_update_show/{id}', [CompanyController::class, 'edit'])->name('admin.company_edit');
Route::post('/company_update_show/{id}', [CompanyController::class, 'update'])->name('admin.company_update');
Route::get('/company_delete/{id}', [CompanyController::class, 'destroy'])->name('admin.company_delete');

// List Person
Route::get('/list_person', [PersonController::class, 'list_person'])->name('admin.account');
Route::get('/person_update_show/{id}', [PersonController::class, 'edit'])->name('admin.account_edit');
Route::post('/person_update_show/{id}', [PersonController::class, 'update'])->name('admin.account_update');
Route::get('/person_delete/{id}', [PersonController::class, 'destroy'])->name('admin.account_delete');


})->middleware(['admin']);
// List person
Route::get('/login', [PersonController::class, 'index'])->name('admin.login');
Route::get('/logout', [PersonController::class,'logoutAdmin'])->name('admin.logout');
Route::get('/register', [PersonController::class, 'create'])->name('register');
Route::post('/register', [PersonController::class, 'store'])->name('admin.register_create');
Route::post('/loginAdmin', [PersonController::class,'PostloginAdmin'])->name('admin.post_login');
