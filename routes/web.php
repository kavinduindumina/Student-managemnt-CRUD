<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [HomeController::class, "index"])->name("home");

//Student
Route::prefix('/students')->group(function (){
    Route::get('/', [StudentController::class, "index"])->name("student");
    Route::post('/store', [StudentController::class, "store"])->name("students.store");
    Route::get('/{student_id}/delete',[StudentController::class, "delete"])->name('student.delete');
    Route::get('/{student_id}/done',[StudentController::class, "done"])->name('student.done');

    // Route::get('/create', [StudentController::class, "create"])->name("students.create");
    // Route::get('/edit/{id}', [StudentController::class, "edit"])->name("students.edit");
    // Route::put('/update/{id}', [StudentController::class, "update"])->name("students.update");
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
