<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CelebsController;
use App\Http\Controllers\Api\VideosController;
use App\Http\Controllers\Api\MagazineController;
use App\Http\Controllers\Api\StudentsController;

use App\Http\Middleware\apiAuth;

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
//Celeb Auth
Route::prefix('Auth')->group(function ()
{
    //Celeb
    Route::post("c_login", [AuthController::class, "celeb_login"]);
    Route::post("c_register", [AuthController::class, "celeb_register"]);
    Route::post("c_activate", [AuthController::class, "celeb_activate_account"]);
    Route::post("c_forgetpassword", [AuthController::class, "celeb_forget_password"]);
    Route::post("c_resetpassword", [AuthController::class, "celeb_reset_password"]);

    //Student
    Route::post("s_register", [AuthController::class, "student_register"]);
    Route::post("s_login", [AuthController::class, "student_login"]);
    Route::post("s_activate", [AuthController::class, "student_activate_account"]);
    Route::post("s_forgetpassword", [AuthController::class, "student_forget_password"]);
    Route::post("s_resetpassword", [AuthController::class, "student_reset_password"]);

});

Route::middleware([apiAuth::class])->group(function ()
{
    ////// ########## Celebrities ########## //////
    Route::post("getvideos", [VideosController::class, "get_videos"]);
    Route::post("getappmagazine", [MagazineController::class, "get_app_magazine"]);
    Route::post("getcelebhome", [CelebsController::class, "get_celeb_home"]);
    Route::post("savevideo", [CelebsController::class, "save_video"]);
    Route::post("savefile", [CelebsController::class, "save_file"]);
    Route::post("celebprofile", [CelebsController::class, "celeb_profile"]);

    Route::post("getcelebdata", [CelebsController::class, "get_celeb_info"]);
    Route::post("updatecelebinfo", [CelebsController::class, "update_celeb_info"]);

    ////// ########## Students ########## //////
    Route::post("getstudenthome", [StudentsController::class, "get_student_home"]);
    Route::post("getstudentprofile", [StudentsController::class, "get_student_profile"]);
    Route::post("getstudentdata", [StudentsController::class, "get_student_info"]);
    Route::post("updatestudentinfo", [StudentsController::class, "update_student_info"]);

});