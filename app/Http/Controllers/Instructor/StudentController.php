<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List Students
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        abort_if(
            !auth()->user()->isInstructor(),
            403
        );

        $students = User::where(
                'school_id',
                auth()->user()->school_id
            )
            ->where('role', 'student')
            ->latest()
            ->get();

        return view(
            'instructor.students.index',
            compact('students')
        );
    }

    public function create()
    {
        abort_if(!auth()->user()->canManageStudents(), 403);
        return view('instructor.students.create');
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(!auth()->user()->canManageStudents(), 403);

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Student
        |--------------------------------------------------------------------------
        */
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'school_id' => auth()->user()->school_id,
            'status' => 'active',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()->route('instructor.students.index');
    }
    /*
    |--------------------------------------------------------------------------
    | Edit Student
    |--------------------------------------------------------------------------
    */

    public function edit(User $student)
    {
        abort_if(
            !auth()->user()->isInstructor(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Same School
        |--------------------------------------------------------------------------
        */

        abort_if(
            $student->school_id !== auth()->user()->school_id,
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Student Role
        |--------------------------------------------------------------------------
        */

        abort_if(
            !$student->isStudent(),
            404
        );

        return view(
            'instructor.students.edit',
            compact('student')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Student
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, User $student)
    {
        abort_if(
            !auth()->user()->isInstructor(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Ensure Same School
        |--------------------------------------------------------------------------
        */

        abort_if(
            $student->school_id !== auth()->user()->school_id,
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
                'unique:users,email,' . $student->id,
            ],
            'status' => [
                'required',
                'in:active,inactive,completed',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Student
        |--------------------------------------------------------------------------
        */

        $student->update([
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
            ->route('instructor.students.index')
            ->with('success', 'Student updated successfully.');
    }
}