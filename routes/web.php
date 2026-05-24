<?php

use App\Http\Controllers\ProfileController;

// User controllers
use App\Http\Controllers\School\UserController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\InstructorController;
use App\Http\Controllers\Instructor\StudentController as InstructorStudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return redirect('/dashboard');
    return view('welcome');
});

Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->isSuperAdmin()) {
        return view('dashboards.super-admin');
    }

    if ($user->isSchoolAdmin()) {
        return view('dashboards.school-admin');
    }

    if ($user->isInstructor()) {
        return view('dashboards.instructor');
    }

    return view('dashboards.student');

})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/school/users', [UserController::class, 'index'])->name('school.users.index');
    Route::get('/school/students', [StudentController::class, 'index'])->name('school.students.index');
    Route::get('/school/instructors', [InstructorController::class, 'index'])->name('school.instructors.index');

    // Instructor routes
    Route::get('/instructor/students', [InstructorStudentController::class, 'index'])->name('instructor.students.index');
});

require __DIR__.'/auth.php';
