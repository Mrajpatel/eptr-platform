<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    PTR - {{ $student->name }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Pilot Training Record
                </p>
            </div>

            <a
                href="{{ url()->previous() }}"
                class="text-sm text-gray-600 hover:text-gray-900"
            >
                Back
            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- PTR Tabs -->
            <div class="bg-white shadow-sm sm:rounded-lg p-4">

                <div class="flex gap-4 border-b border-gray-200">

                    <!-- PPL -->
                    <a
                        href="{{ request()->url() }}?course=ppl"
                        class="px-4 py-2 text-sm font-semibold transition
                        {{ $course === 'ppl'
                            ? 'text-blue-600 border-b-2 border-blue-600'
                            : 'text-gray-500 hover:text-gray-700'
                        }}"
                    >
                        PPL
                    </a>

                    <!-- CPL -->
                    <a
                        href="{{ request()->url() }}?course=cpl"
                        class="px-4 py-2 text-sm font-semibold transition
                        {{ $course === 'cpl'
                            ? 'text-blue-600 border-b-2 border-blue-600'
                            : 'text-gray-500 hover:text-gray-700'
                        }}"
                    >
                        CPL
                    </a>

                    <!-- Multi -->
                    <a
                        href="{{ request()->url() }}?course=multi"
                        class="px-4 py-2 text-sm font-semibold transition
                        {{ $course === 'multi'
                            ? 'text-blue-600 border-b-2 border-blue-600'
                            : 'text-gray-500 hover:text-gray-700'
                        }}"
                    >
                        Multi Engine
                    </a>

                    <!-- IFR -->
                    <a
                        href="{{ request()->url() }}?course=ifr"
                        class="px-4 py-2 text-sm font-semibold transition
                        {{ $course === 'ifr'
                            ? 'text-blue-600 border-b-2 border-blue-600'
                            : 'text-gray-500 hover:text-gray-700'
                        }}"
                    >
                        Instrument
                    </a>

                </div>

            </div>

            <!-- Course Content -->
            @if($course === 'ppl')

                <div class="bg-white shadow-sm sm:rounded-lg p-6">

                    <h3 class="text-lg font-semibold text-gray-900 mb-6">
                        Private Pilot Licence - Pilot Training Record
                    </h3>

                    <!-- Student Information -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                        <div>
                            <p class="text-sm text-gray-500">
                                Student
                            </p>

                            <p class="font-semibold text-gray-900">
                                {{ $student->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">
                                School
                            </p>

                            <p class="font-semibold text-gray-900">
                                {{ $student->school->name ?? '—' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">
                                Primary Instructor
                            </p>

                            <p class="font-semibold text-gray-900">
                                {{ $student->studentProfile->primaryInstructor->name ?? '—' }}
                            </p>
                        </div>

                    </div>

                    <!-- PTR Sections -->
                    <div class="space-y-6">

                        <!-- Pilot Training Record -->
                        <div class="border rounded-lg p-5">

                            <h4 class="font-semibold text-gray-900 mb-4">
                                Pilot Training Record
                            </h4>

                            <p class="text-sm text-gray-500">
                                Student, licence, medical, and training information.
                            </p>

                        </div>

                        <!-- First Solo Checklist -->
                        <div class="border rounded-lg p-5">

                            <h4 class="font-semibold text-gray-900 mb-4">
                                First Solo Check List
                            </h4>

                            <p class="text-sm text-gray-500">
                                PSTAR, radio licence, medical, and solo authorization tracking.
                            </p>

                        </div>

                        <!-- Ground School -->
                        <div class="border rounded-lg p-5">

                            <h4 class="font-semibold text-gray-900 mb-4">
                                Ground School Classes
                            </h4>

                            <p class="text-sm text-gray-500">
                                Ground school attendance and records.
                            </p>

                        </div>

                        <!-- Flights -->
                        <div class="border rounded-lg p-5">

                            <h4 class="font-semibold text-gray-900 mb-4">
                                Flights
                            </h4>

                            <p class="text-sm text-gray-500">
                                Flight entries, exercises, notes, and instructor feedback.
                            </p>

                        </div>

                        <!-- Comments -->
                        <div class="border rounded-lg p-5">

                            <h4 class="font-semibold text-gray-900 mb-4">
                                Comments
                            </h4>

                            <p class="text-sm text-gray-500">
                                Instructor comments and recommendations.
                            </p>

                        </div>

                    </div>

                </div>

            @elseif($course === 'cpl')

                <div class="bg-white shadow-sm sm:rounded-lg p-6">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Commercial Pilot Licence PTR
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        CPL template coming soon.
                    </p>

                </div>

            @elseif($course === 'multi')

                <div class="bg-white shadow-sm sm:rounded-lg p-6">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Multi Engine Rating PTR
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Multi Engine template coming soon.
                    </p>

                </div>

            @elseif($course === 'ifr')

                <div class="bg-white shadow-sm sm:rounded-lg p-6">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Instrument Rating PTR
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        IFR template coming soon.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>