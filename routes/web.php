<?php

use App\Http\Controllers\ChildCategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;

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
    return view('login');
});
Route::post('auth', [AuthController::class, 'auth']);
Route::get('dashboard', [DashboardController::class, 'dashboard']);

//Role routes
Route::get('roles', [RegistrationController::class, 'roles']);
Route::get('rolesAdd', [RegistrationController::class, 'rolesAdd']);
Route::post('roleCreate', [RegistrationController::class, 'roleCreate']);
Route::get('viewRole/{id}', [RegistrationController::class, 'viewRole']);
Route::get('editRole/{id}', [RegistrationController::class, 'editRole']);
Route::get('deleteRole/{id}', [RegistrationController::class, 'deleteRole']);

//user routes
Route::get('listUser', [RegistrationController::class, 'listUser']);
Route::get('usersAdd', [RegistrationController::class, 'usersAdd']);
Route::post('userCreate', [RegistrationController::class, 'userCreate']);
Route::get('viewUser/{id}', [RegistrationController::class, 'viewUser']);
Route::get('editUser/{id}', [RegistrationController::class, 'editUser']);
Route::get('deleteUser/{id}', [RegistrationController::class, 'deleteUser']);

//categories routes
Route::get('categories', [CategoriesController::class, 'categories']);
Route::get('categoriesAdd', [CategoriesController::class, 'categoriesAdd']);
Route::post('catCreate', [CategoriesController::class, 'catCreate']);
Route::get('viewCategories/{id}', [CategoriesController::class, 'viewCategories']);
Route::get('editCategories/{id}', [CategoriesController::class, 'editCategories']);
Route::get('deleteCategories/{id}', [CategoriesController::class, 'deleteCategories']);

Route::get('subCategories', [SubCategoriesController::class, 'subCategories']);
Route::get('subCategoriesAdd', [SubCategoriesController::class, 'subCategoriesAdd']);
Route::post('subCatCreate', [SubCategoriesController::class, 'subCatCreate']);
Route::get('viewSubCategories/{id}', [SubCategoriesController::class, 'viewSubCategories']);
Route::get('editSubCategories/{id}', [SubCategoriesController::class, 'editSubCategories']);
Route::get('deleteSubCategories/{id}', [SubCategoriesController::class, 'deleteSubCategories']);

Route::get('childCategories', [ChildCategoriesController::class, 'childCategories']);
Route::get('childCategoriesAdd', [ChildCategoriesController::class, 'childCategoriesAdd']);
Route::get('viewChildCategories/{id}', [ChildCategoriesController::class, 'viewChildCategories']);
Route::get('editChildCategories/{id}', [ChildCategoriesController::class, 'editChildCategories']);
Route::get('deleteChildCategories/{id}', [ChildCategoriesController::class, 'deleteChildCategories']);
