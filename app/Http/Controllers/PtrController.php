<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PtrController extends Controller
{
    //
    public function show(User $student)
    {
        $user = auth()->user();

        abort_if(!$student->isStudent(), 404);

        if ($user->isInstructor() || $user->isSchoolAdmin()) {
            abort_if($student->school_id !== $user->school_id, 403);
        } elseif (!$user->isSuperAdmin()) {
            abort(403);
        }

        $student->load([
            'school',
            'studentProfile.primaryInstructor',
            'studentProfile.secondaryInstructor',
        ]);

        $course = request('course', 'ppl');

        abort_if(!in_array($course, ['ppl', 'cpl', 'multi', 'ifr']), 404);

        return view('ptr.show', compact('student', 'course'));
    }

    public function showOwn()
    {
        $student = auth()->user();

        abort_if(!$student->isStudent(), 403);

        $student->load([
            'school',
            'studentProfile.primaryInstructor',
            'studentProfile.secondaryInstructor',
        ]);

        $course = request('course', 'ppl');

        abort_if(!in_array($course, ['ppl', 'cpl', 'multi', 'ifr']), 404);

        return view('ptr.show', compact('student', 'course'));
    }
}
