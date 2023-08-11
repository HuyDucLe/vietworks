<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GuestController;

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
    return view('welcome');
});
Route::get('test',         function () {
    return view('test');
});
Route::get('blank',         function () {
    return view('blank');
});
Route::view('login',        'login');
Route::view('register',     'register');
Route::view('companies',    'companies');
Route::get('company-detail.{id}',[GuestController::class, 'detail']);
Route::get('index',         [GuestController::class, 'home']);
Route::get('search',        [GuestController::class, 'search']);
Route::post('search',       [GuestController::class, 'getsearch']);

Route::post('apply.{id}',   [CandidateController::class, 'apply']);
Route::get('resume',        [CandidateController::class, 'resume']);
Route::post('cv',           [CandidateController::class, 'cv']);
Route::get('job',           [CandidateController::class, 'job']);

Route::get('accept.{id}',   [EmployeeController::class, 'accept']);
Route::get('deny.{id}',     [EmployeeController::class, 'deny']);
Route::get('list',          [EmployeeController::class, 'list']);
Route::get('post',          [EmployeeController::class, 'post']);
Route::get('candidate.{id}',[EmployeeController::class, 'candidate']);
Route::get('edit.{id}',     [EmployeeController::class, 'edit']);
Route::get('delete.{id}',   [EmployeeController::class, 'destroy']);
Route::get('resume.{id}',   [EmployeeController::class, 'info']);
Route::post('addjob',       [EmployeeController::class, 'store']);


Route::group(['prefix' => 'admin.company'], function () {
    Route::get('',          [CompanyController::class, 'index']);
    Route::post('store',    [CompanyController::class, 'store']);
    Route::post('edit',     [CompanyController::class, 'edit']);
    Route::post('delete',   [CompanyController::class, 'destroy']);
});
Route::group(['prefix' => 'admin.user'], function () {
    Route::get('',          [UserController::class, 'index']);
    Route::post('store',    [UserController::class, 'store']);
    Route::post('edit',     [UserController::class, 'edit']);
    Route::post('delete',   [UserController::class, 'destroy']);

});
Route::group(['prefix' => 'admin.post'], function () {
    Route::get('',          [PostController::class, 'index']);
    Route::post('store',    [PostController::class, 'store']);
    Route::post('edit',     [PostController::class, 'edit']);
    Route::post('delete',   [PostController::class, 'destroy']);
});
Route::group(['prefix' => 'admin.cate'], function () {
    Route::get('',          [CateController::class, 'index']);
    Route::post('store',    [CateController::class, 'store']);
    Route::post('edit',     [CateController::class, 'edit']);
    Route::post('delete',   [CateController::class, 'destroy']);
});
Route::get('admin',         [AdminController::class, 'table']);
Route::view('admin.profile','admin.profile');
Route::view('admin.table',  'admin.index');
Route::get('admin.{ql}',    [AdminController::class, 'index']);
Route::get('register',      [LoginController::class, 'register_show']);
Route::post('register',     [LoginController::class, 'register']);
Route::get('login',         [LoginController::class, 'login_show']);
Route::post('login',        [LoginController::class, 'login']);
Route::get ('logout',       [LoginController::class, 'logout']);
