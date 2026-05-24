<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(!auth()->user()->isSchoolAdmin(), 403);

        /*
        |--------------------------------------------------------------------------
        | Get Users From Same School
        |--------------------------------------------------------------------------
        */
        $users = User::where(
                'school_id',
                auth()->user()->school_id
            )
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */
        return view('school.users.index', compact('users'));
    }
}
