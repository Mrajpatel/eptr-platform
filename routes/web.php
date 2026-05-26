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

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | School Admin: routes managed by school/school-amin
    |--------------------------------------------------------------------------
    */
    Route::prefix('school')
        ->name('school.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | Manage Users
            |--------------------------------------------------------------------------
            */
            Route::get('/users', [UserController::class, 'index'])->name('users.index');

            /*
            |--------------------------------------------------------------------------
            | Manage Students 
            |--------------------------------------------------------------------------
            */
            Route::get('/students', [StudentController::class, 'index'])->name('students.index');
            Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
            Route::post('/students', [StudentController::class, 'store'])->name('students.store');
            Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
            Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
            Route::patch('/students/{user}/deactivate', [StudentController::class, 'deactivate'])->name('students.deactivate');
            
            Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
            /*
            |--------------------------------------------------------------------------
            | Manage Instructors
            |--------------------------------------------------------------------------
            */
            Route::get('/instructors', [InstructorController::class, 'index'])->name('instructors.index');
            Route::get('/instructors/create', [InstructorController::class, 'create'])->name('instructors.create');
            Route::post('/instructors', [InstructorController::class, 'store'])->name('instructors.store');
            Route::get('/instructors/{instructor}/edit', [InstructorController::class, 'edit'])->name('instructors.edit');
            Route::patch('/instructors/{instructor}', [InstructorController::class, 'update'])->name('instructors.update');

        });

    /*
    |--------------------------------------------------------------------------
    | Instructor: access routes managed by instructor
    |--------------------------------------------------------------------------
    */
    Route::prefix('instructor')
        ->name('instructor.')
        ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Manage Students
        |--------------------------------------------------------------------------
        */
        Route::get('/students', [InstructorStudentController::class, 'index']) ->name('students.index');
        Route::get('/students/create', [InstructorStudentController::class, 'create'])->name('students.create');
        Route::post('/students', [InstructorStudentController::class, 'store'])->name('students.store');
        Route::get('/students/{student}/edit', [InstructorStudentController::class, 'edit'])->name('students.edit');
        Route::patch('/students/{student}', [InstructorStudentController::class, 'update'])->name('students.update');

    });

});

require __DIR__.'/auth.php';
