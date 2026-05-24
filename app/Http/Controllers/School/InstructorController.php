<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\User;

class InstructorController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */

        abort_if(!auth()->user()->isSchoolAdmin(), 403);

        /*
        |--------------------------------------------------------------------------
        | Get School Instructors
        |--------------------------------------------------------------------------
        */

        $instructors = User::where('school_id', auth()->user()->school_id)
            ->where('role', 'instructor')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('school.instructors.index', compact('instructors'));
    }
}