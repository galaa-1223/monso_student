<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\StudentAuthController;

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentsController;

use App\Http\Controllers\Student\TeachersController;
use App\Http\Controllers\Student\AngiController;
use App\Http\Controllers\Student\HicheelController;
use App\Http\Controllers\Student\HuvaariController;
use App\Http\Controllers\Student\MergejilController;
use App\Http\Controllers\Student\MergejilBagshController;
use App\Http\Controllers\Student\TenhimController;
use App\Http\Controllers\Student\SettingsController;
use App\Http\Controllers\Student\EventController;
use App\Http\Controllers\Student\EschoolController;
use App\Http\Controllers\Student\AguulgaController;
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
Auth::routes();

/****************************************************************************/
/********************************** Student *********************************/
/****************************************************************************/

// Student Login
Route::get('/', [StudentAuthController::class, 'studentGet'])->name('studentLogin');
Route::get('login', [StudentAuthController::class, 'studentGetLogin'])->name('studentLogin');
Route::post('login', [StudentAuthController::class, 'studentLogin'])->name('studentLoginPost');
Route::get('logout', [StudentAuthController::class, 'studentLogout'])->name('logout');

Route::group(['middleware' => 'studentauth'], function () {
	// student Dashboard
	Route::get('dashboard',[StudentController::class, 'dashboard'])->name('student-dashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersController::class, 'index'])->name('student-teachers');

	Route::delete('teachers/delete/{id}',[TeachersController::class, 'destroy'])->name('student-teachers-delete');

	// Angi
	Route::get('angiud',[AngiController::class, 'index'])->name('student-angi');

	Route::post('angi/add',[AngiController::class, 'store'])->name('student-angi-save');
	Route::post('angi/edit/{id}',[AngiController::class, 'update'])->name('student-angi-edit');

	Route::delete('angi/delete/{id}',[AngiController::class, 'destroy'])->name('student-angi-delete');

	// Mergejil
	Route::get('mergejil',[MergejilController::class, 'index'])->name('student-mergejil');
	
	// Tenhim
	Route::get('tenhim',[TenhimController::class, 'index'])->name('student-tenhim');

	// Hicheel
	Route::get('hicheel',[HicheelController::class, 'index'])->name('student-hicheel');
	Route::get('hicheel/add',[HicheelController::class, 'add'])->name('student-hicheel-add');
	Route::get('hicheel/edit/{id}',[HicheelController::class, 'edit'])->name('hicheel-edit');

	Route::post('hicheel/add',[HicheelController::class, 'store'])->name('student-hicheel-save');
	Route::post('hicheel/edit/{id}',[HicheelController::class, 'update'])->name('student-hicheel-edit');
	Route::post('hicheel/delete/',[HicheelController::class, 'delete'])->name('student-hicheel-delete-ajax');

	Route::delete('hicheel/delete/{id}',[HicheelController::class, 'destroy'])->name('student-hicheel-delete');

	// Huvaari
	Route::get('huvaari',[HuvaariController::class, 'index'])->name('student-huvaari');
	Route::get('huvaari/bagsh/{bagshId}',[HuvaariController::class, 'bagsh'])->name('student-huvaari-bagsh');

	// Students
	Route::get('students',[StudentsController::class, 'index'])->name('student-students');
	Route::get('students/add',[StudentsController::class, 'add'])->name('student-students-add');
	Route::get('students/edit/{id}',[StudentsController::class, 'edit'])->name('students-edit');

	Route::post('students/add',[StudentsController::class, 'store'])->name('student-students-save');
	Route::post('students/edit/{id}',[StudentsController::class, 'update'])->name('student-students-edit');
	Route::post('students/delete/',[StudentsController::class, 'delete'])->name('student-students-delete-ajax');

	// Eschool
	Route::get('eschool',[EschoolController::class, 'index'])->name('student-eschool');
	Route::get('eschool/{slug}/sedevs',[EschoolController::class, 'sedevs'])->name('student-eschool-sedevs');
	Route::get('eschool/{slug}/sedev/{id}',[EschoolController::class, 'sedev'])->name('student-eschool-sedev');
	// Route::get('eschool/{slug}/sedev/add',[EschoolController::class, 'sedevAdd'])->name('student-eschool-sedev-add');

	// Route::get('eschool/{slug}/sedev/{id}/aguulga/add',[AguulgaController::class, 'aguulgaAdd'])->name('student-eschool-aguulga-add');

	// Route::post('eschool/{slug}/sedev/save',[EschoolController::class, 'sedevSave'])->name('student-eschool-sedev-save');
	// Route::post('eschool/{slug}/sedev/{id}/aguulga/save',[AguulgaController::class, 'aguulgaSave'])->name('student-eschool-aguulga-save');
	// Route::post('eschool/{slug}/sedev/{id}/aguulga/uploads',[AguulgaController::class, 'aguulgaUploads'])->name('student-eschool-aguulga-uploads');

	// Settings
	Route::get('settings',[SettingsController::class, 'index'])->name('student-settings');
	Route::get('settings/password',[SettingsController::class, 'password'])->name('student-settings-password');
	Route::get('settings/huvaari',[SettingsController::class, 'huvaari'])->name('student-settings-huvaari');

	Route::post('settings/changePassword',[SettingsController::class, 'changePassword'])->name('student-settings-changepassword');
	Route::post('settings/changePicture/{id}',[SettingsController::class, 'changePicture'])->name('student-settings-changepicture');

	// Event
	Route::get('events',[EventController::class, 'index'])->name('student-events');

});
