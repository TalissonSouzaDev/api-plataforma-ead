<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController
};

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

/** Cursos */
Route::get('/courses',[CourseController::class,'index']);
Route::get('/course/{id}',[CourseController::class,'show']);
/** Modulos */
Route::get('/course/{id}/modules',[ModuleController::class,'index']);
/** Aulas */
Route::get('/modules/{id}/lessons',[LessonController::class,'index']);
Route::get('/lessons/{id}',[LessonController::class,'show']);


Route::get("/", function(){
    return response()->json(['success'=> false]);
});
