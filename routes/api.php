<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController,
    SupportController
};
use App\Http\Controllers\Api\Auth\{AuthController,ResetPasswordController};
use App\Models\ReplySupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// auth
Route::post('/auth',[AuthController::class,'auth']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/me',[AuthController::class,'me'])->middleware('auth:sanctum');


// Reset Password
Route::get('/forgot-password',[ResetPasswordController::class,'sendResetLink'])->middleware('guest');
Route::post('/reset-password',[ResetPasswordController::class,'resetPassword'])->middleware('guest');

Route::middleware(['auth:sanctum'])->group(function(){
    /** Cursos */
Route::get('/courses',[CourseController::class,'index']);
Route::get('/course/{id}',[CourseController::class,'show']);
/** Modulos */
Route::get('/course/{id}/modules',[ModuleController::class,'index']);
/** Aulas */
Route::get('/modules/{id}/lessons',[LessonController::class,'index']);
Route::get('/lessons/{id}',[LessonController::class,'show']);

Route::post('/lesson/viewed',[LessonController::class,'viewed']);
/** suportes */
Route::get('/my-supports',[SupportController::class,'mySupports']);
Route::get('/supports',[SupportController::class,'index']);
Route::post('/supports',[SupportController::class,'store']);


Route::post('/supports/{id}/replies',[ReplySupport::class,'createReply']);

});


Route::get("/", function(){
    return response()->json(['success'=> false]);
});
