<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Question;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\Personel;
use App\Http\Controllers\Admin\RoleManagement;
use App\Http\Controllers\Admin\Users;
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

Auth::routes();

Route::get('/',[Dashboard::class,'index'])->middleware('auth')->name('admin.dashboard');

Route::get('/profile',[Users::class,'profile'])->middleware('auth')->name("admin.profile");
Route::put('/profile',[Users::class,'updateProfile'])->middleware('auth')->name("admin.profile.update");

Route::get('/users',[Users::class,'index'])->middleware('auth','can:view-users')->name("admin.users");

Route::get('/personel',[Personel::class,'index'])->middleware('auth','can:view-personel')->name("admin.personels");
Route::get('/personel/create',[Personel::class,'create'])->middleware('auth','can:create-personel')->name("admin.personel.create");
Route::post('/personel',[Personel::class,'store'])->middleware('auth','can:create-personel')->name("admin.personel.store");
Route::get('/personel/{id}/edit',[Personel::class,'edit'])->middleware('auth','can:edit-personel')->name("admin.personel.edit");
Route::put('/personel/{id}/update',[Personel::class,'update'])->middleware('auth','can:edit-personel')->name("admin.personel.update");
Route::delete('/personel/{id}/delete',[Personel::class,'destroy'])->middleware('auth','can:delete-personel')->name("admin.personel.destroy");

Route::get('/roles',[RoleManagement::class,'index'])->middleware('auth','can:role-management')->name("admin.roles");
Route::post('/role',[RoleManagement::class,'store'])->middleware('auth','can:role-management')->name("admin.role.store");
Route::put('/role/{id}/update',[RoleManagement::class,'update'])->middleware('auth','can:role-management')->name("admin.role.update");
Route::delete('/role/{id}/delete',[RoleManagement::class,'destroy'])->middleware('auth','can:role-management')->name("admin.role.destroy");
Route::put('/permission/{id}/update',[RoleManagement::class,'updatePermission'])->middleware('auth','can:permission-management')->name("admin.permission.update");

Route::resource('questions', Question::class, ['names' => 'questions'])->middleware('auth','can:view-question');

Route::resource('category', Category::class, ['names' => 'categories'])->middleware('auth','can:view-category');
