<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function create() 
    {
        abort_if(!auth()->user()->isSchoolAdmin(), 403);
        return view('school.instructors.create');
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(!auth()->user()->isSchoolAdmin(), 403);

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Instructor
        |--------------------------------------------------------------------------
        */
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'instructor',
            'school_id' => auth()->user()->school_id,
            'status' => $validated['status'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()->route('school.instructors.index');
    }

    public function edit(User $instructor)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(
            !auth()->user()->isSchoolAdmin(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Same School
        |--------------------------------------------------------------------------
        */
        abort_if(
            $instructor->school_id !== auth()->user()->school_id,
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Instructor Role
        |--------------------------------------------------------------------------
        */
        abort_if(
            !$instructor->isInstructor(),
            404
        );

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */
        return view(
            'school.instructors.edit',
            compact('instructor')
        );
    }

    public function update(Request $request, User $instructor)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(
            !auth()->user()->isSchoolAdmin(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Same School
        |--------------------------------------------------------------------------
        */
        abort_if(
            $instructor->school_id !== auth()->user()->school_id,
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Validate
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $instructor->id,
            ],
            'status' => [
                'required',
                'in:active,inactive',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Instructor
        |--------------------------------------------------------------------------
        */
        $instructor->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('school.instructors.index')
            ->with('success', 'Instructor updated successfully.');
    }
}