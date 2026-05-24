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
    | School Admin
    |--------------------------------------------------------------------------
    */

    Route::prefix('school')
        ->name('school.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | Users
            |--------------------------------------------------------------------------
            */
            Route::get('/users', [UserController::class, 'index'])
                ->name('users.index');

            /*
            |--------------------------------------------------------------------------
            | Students
            |--------------------------------------------------------------------------
            */
            Route::get('/students', [StudentController::class, 'index'])
                ->name('students.index');

            Route::get('/students/create', [StudentController::class, 'create'])
                ->name('students.create');

            Route::post('/students', [StudentController::class, 'store'])
                ->name('students.store');

            Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
                ->name('students.edit');

            Route::patch('/students/{student}', [StudentController::class, 'update'])
                ->name('students.update');

            Route::patch('/students/{user}/deactivate', [StudentController::class, 'deactivate'])
                ->name('students.deactivate');

            /*
            |--------------------------------------------------------------------------
            | Instructors
            |--------------------------------------------------------------------------
            */
            Route::get('/instructors', [InstructorController::class, 'index'])
                ->name('instructors.index');

        });

    /*
    |--------------------------------------------------------------------------
    | Instructor
    |--------------------------------------------------------------------------
    */

    Route::prefix('instructor')
        ->name('instructor.')
        ->group(function () {

            Route::get('/students', [InstructorStudentController::class, 'index'])
                ->name('students.index');

        });

});

require __DIR__.'/auth.php';
