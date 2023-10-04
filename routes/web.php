<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,HomeController,EmployeeController,TeamleadController,HrController};


Route::get('/', [HomeController::class,'index']);
Route::get('employee/signin', [EmployeeController::class,'signin']);
Route::post('employee/post-login', [EmployeeController::class,'postLogin']);
Route::get('employee/signup', [EmployeeController::class,'signup']);
Route::post('employee/post-signup', [EmployeeController::class,'postSignup']);
Route::get('employee/leaves', [EmployeeController::class,'leaves']);
Route::get('employee/add-leave', [EmployeeController::class,'addLeave']);
Route::post('employee/post-leave', [EmployeeController::class,'postLeave']);
Route::get('employee/logout', [EmployeeController::class,'logout']);

Route::get('team-lead/signin', [TeamleadController::class,'signin']);
Route::get('team-lead/signup', [TeamleadController::class,'signup']);
Route::post('team-lead/post-signup', [TeamleadController::class,'postSignup']);
Route::post('team-lead/post-login', [TeamleadController::class,'postLogin']);
Route::get('team-lead/leaves', [TeamleadController::class,'leaves']);
Route::get('team-lead/add-leave', [TeamleadController::class,'addLeave']);
Route::post('team-lead/post-leave', [TeamleadController::class,'postLeave']);
Route::post('team-lead/change-status', [TeamleadController::class,'changeStatus']);
Route::any('team-lead/logout', [TeamleadController::class,'logout']);

Route::get('hr/signin', [HrController::class,'signin']);
Route::get('hr/signup', [HrController::class,'signup']);
Route::post('hr/post-signup', [HrController::class,'postSignup']);
Route::post('hr/post-login', [HrController::class,'postLogin']);
Route::get('hr/leaves', [HrController::class,'leaves']);
Route::post('hr/change-status', [HrController::class,'changeStatus']);
Route::get('hr/logout', [HrController::class,'logout']);
