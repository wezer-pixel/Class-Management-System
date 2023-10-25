<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'home'])->name('dashboard');
});



Route::get('/', [StudentController::class,'home']);

Route::get('/show_assignment', [StudentController::class, 'show_assignment']);

Route::post('/upload_assign', [StudentController::class, 'upload_assign']);

Route::get('assignment_show/{id}', [StudentController::class, 'assignment_show']);

Route::get('/download-assignment/{filename}', [StudentController::class, 'download_assignment']);

Route::post('submit_assignment/{id}', [StudentController::class,'submit_assignment']);

Route::get('submissions', [StudentController::class,'submissions']);

Route::get('submission_show/{id}', [StudentController::class,'show_submissions']);

Route::get('/download_submission/{filename}', [StudentController::class,'download_submission']);

Route::patch('/update_score/{id}', [StudentController::class,'update_score']);