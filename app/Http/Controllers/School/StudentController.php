<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */

        abort_if(!auth()->user()->canManageStudents(), 403);

        /*
        |--------------------------------------------------------------------------
        | Get School Students
        |--------------------------------------------------------------------------
        */

        $students = User::where('school_id', auth()->user()->school_id)
            ->where('role', 'student')
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('school.students.index', compact('students'));
    }

    public function create()
    {
        abort_if(!auth()->user()->canManageStudents(), 403);
        return view('school.students.create');
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
        return redirect()->route('school.students.index');
    }

    public function deactivate(User $user)
    {
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
            $user->school_id !== auth()->user()->school_id,
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Prevent Self-Deactivation
        |--------------------------------------------------------------------------
        */

        abort_if(
            $user->id === auth()->id(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Deactivate
        |--------------------------------------------------------------------------
        */

        $user->update([
            'status' => 'inactive',
        ]);

        return back();
    }

    public function edit(User $student)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(
            !auth()->user()->canManageStudents(),
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

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */
        return view(
            'school.students.edit',
            compact('student')
        );
    }

    public function update(Request $request, User $student)
    {
        /*
        |--------------------------------------------------------------------------
        | Authorization
        |--------------------------------------------------------------------------
        */
        abort_if(
            !(auth()->user()->isSchoolAdmin() ||
            auth()->user()->isInstructor()),
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
            ->route('school.students.index')
            ->with('success', 'Student updated successfully.');
    }
}