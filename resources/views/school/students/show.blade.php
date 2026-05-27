<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Student Profile
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    View student training information
                </p>

            </div>

            <a
                href="{{ route('school.students.edit', $student) }}"
                class="inline-flex items-center px-5 py-3 bg-blue-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-blue-700 transition shadow-sm"
            >
                Edit Student
            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Student Overview -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex items-start justify-between mb-8">

                        <div>

                            <h1 class="text-3xl font-bold text-gray-900">
                                {{ $student->name }}
                            </h1>

                            <p class="text-gray-500 mt-1">
                                {{ $student->email }}
                            </p>

                        </div>

                        <div>

                            @if($student->status === 'active')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Active
                                </span>

                            @elseif($student->status === 'inactive')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                    Inactive
                                </span>

                            @elseif($student->status === 'completed')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Completed
                                </span>

                            @endif

                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <!-- Left -->
                        <div class="space-y-5">

                            <div>
                                <p class="text-sm text-gray-500">
                                    Student ID
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->student_id ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Address
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->address ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    City
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->city ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Province
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->province ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Country
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->country ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Postal Code
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->postal_code ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Citizenship
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->citizenship ?? '—' }}
                                </p>
                            </div>

                        </div>

                        <!-- Right -->
                        <div class="space-y-5">

                            <div>
                                <p class="text-sm text-gray-500">
                                    Phone
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->phone ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Other Phone
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->other_phone ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Emergency Contact
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->emergency_contact_name ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Emergency Contact Phone
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->emergency_contact_phone ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Licence Number
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->licence_number ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Date of Birth
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->date_of_birth ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Medical Expiry
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->medical_expiry ?? '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Medical Category
                                </p>

                                <p class="font-medium text-gray-900">
                                    {{ $student->studentProfile->medical_category ?? '—' }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Training Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        Training Summary
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div class="border rounded-lg p-5">

                            <p class="text-sm text-gray-500">
                                Cohort
                            </p>

                            <p class="text-xl font-semibold text-gray-900 mt-2">
                                {{ $student->studentProfile->cohort ?? '—' }}
                            </p>

                        </div>

                        <div class="border rounded-lg p-5">

                            <p class="text-sm text-gray-500">
                                Primary Instructor
                            </p>

                            <p class="text-xl font-semibold text-gray-900 mt-2">
                                {{ $student->studentProfile->primaryInstructor->name ?? '—' }}
                            </p>

                        </div>

                        <div class="border rounded-lg p-5">

                            <p class="text-sm text-gray-500">
                                Secondary Instructor
                            </p>

                            <p class="text-xl font-semibold text-gray-900 mt-2">
                                {{ $student->studentProfile->secondaryInstructor->name ?? '—' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>