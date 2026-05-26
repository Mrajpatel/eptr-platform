<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        $students = User::where('school_id', auth()->user()->school_id)
            ->where('role', 'student')
            ->latest()
            ->get();

        return view('instructor.students.index', compact('students'));
    }

    public function create()
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        return view('instructor.students.create');
    }

    public function store(Request $request)
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'school_id' => auth()->user()->school_id,
            'status' => 'active',
        ]);

        return redirect()
            ->route('instructor.students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(User $student)
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        abort_if($student->school_id !== auth()->user()->school_id, 403);

        abort_if(!$student->isStudent(), 404);

        $student->load([
            'school',
            'studentProfile.primaryInstructor',
            'studentProfile.secondaryInstructor',
        ]);

        return view('instructor.students.show', compact('student'));
    }

    public function edit(User $student)
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        abort_if($student->school_id !== auth()->user()->school_id, 403);

        abort_if(!$student->isStudent(), 404);

        $student->load('studentProfile');

        if (!$student->studentProfile) {
            $student->studentProfile()->create([]);
            $student->load('studentProfile');
        }

        $instructors = User::where('school_id', auth()->user()->school_id)
            ->where('role', 'instructor')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('instructor.students.edit', compact('student', 'instructors'));
    }

    public function update(Request $request, User $student)
    {
        abort_if(!auth()->user()->isInstructor(), 403);

        abort_if($student->school_id !== auth()->user()->school_id, 403);

        abort_if(!$student->isStudent(), 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $student->id,
            ],

            'status' => ['required', 'in:active,inactive,completed'],

            'student_id' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'citizenship' => ['nullable', 'string', 'max:255'],
            'other_address' => ['nullable', 'string', 'max:255'],

            'phone' => ['nullable', 'string', 'max:255'],
            'other_phone' => ['nullable', 'string', 'max:255'],

            'emergency_contact_name' => ['nullable', 'string', 'max:255'],
            'emergency_contact_phone' => ['nullable', 'string', 'max:255'],

            'licence_number' => ['nullable', 'string', 'max:255'],

            'date_of_birth' => ['nullable', 'date'],
            'medical_date' => ['nullable', 'date'],
            'medical_expiry' => ['nullable', 'date'],
            'medical_category' => ['nullable', 'string', 'max:255'],

            'cohort' => ['nullable', 'string', 'max:255'],

            'primary_instructor_id' => ['nullable', 'exists:users,id'],
            'secondary_instructor_id' => ['nullable', 'exists:users,id'],
        ]);

        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        $student->studentProfile()->updateOrCreate(
            [
                'user_id' => $student->id,
            ],
            [
                'student_id' => $validated['student_id'] ?? null,
                'address' => $validated['address'] ?? null,
                'city' => $validated['city'] ?? null,
                'province' => $validated['province'] ?? null,
                'country' => $validated['country'] ?? null,
                'postal_code' => $validated['postal_code'] ?? null,
                'citizenship' => $validated['citizenship'] ?? null,
                'other_address' => $validated['other_address'] ?? null,

                'phone' => $validated['phone'] ?? null,
                'other_phone' => $validated['other_phone'] ?? null,

                'emergency_contact_name' => $validated['emergency_contact_name'] ?? null,
                'emergency_contact_phone' => $validated['emergency_contact_phone'] ?? null,

                'licence_number' => $validated['licence_number'] ?? null,

                'date_of_birth' => $validated['date_of_birth'] ?? null,
                'medical_date' => $validated['medical_date'] ?? null,
                'medical_expiry' => $validated['medical_expiry'] ?? null,
                'medical_category' => $validated['medical_category'] ?? null,

                'cohort' => $validated['cohort'] ?? null,

                'primary_instructor_id' => $validated['primary_instructor_id'] ?? null,
                'secondary_instructor_id' => $validated['secondary_instructor_id'] ?? null,
            ]
        );

        return redirect()
            ->route('instructor.students.show', $student)
            ->with('success', 'Student profile updated successfully.');
    }
}