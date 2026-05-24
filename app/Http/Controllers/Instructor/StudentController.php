<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */

        abort_if(!auth()->user()->isInstructor(), 403);

        /*
        |--------------------------------------------------------------------------
        | Get Students
        |--------------------------------------------------------------------------
        */

        $students = User::where(
                'school_id',
                auth()->user()->school_id
            )
            ->where('role', 'student')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('instructor.students.index', compact('students'));
    }
}