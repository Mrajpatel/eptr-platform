<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Instructors
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage school instructors
                </p>
            </div>

            <a
                href="{{ route('school.instructors.create') }}"
                class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-blue-700 transition shadow-sm"
            >

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4" />

                </svg>

                <span>
                    Instructor
                </span>

            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Name
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Status
                                </th>

                                <th class="px-6 py-4 w-24"></th>

                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($instructors as $instructor)

                                <tr class="hover:bg-gray-50">

                                    <!-- Name -->
                                    <td class="px-6 py-4">

                                        <div class="font-medium text-gray-900">
                                            {{ $instructor->name }}
                                        </div>

                                    </td>

                                    <!-- Email -->
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $instructor->email }}
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4">

                                        @if($instructor->status === 'active')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                                Active
                                            </span>

                                        @elseif($instructor->status === 'inactive')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-yellow-700">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-end gap-3">

                                            <!-- Edit -->
                                            <a
                                                href="{{ route('school.instructors.edit', $instructor) }}"
                                                class="text-gray-400 hover:text-blue-600 transition"
                                                title="Edit Instructor"
                                            >

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5h2m-1-1v2m-7 9v4h4l10-10a2.828 2.828 0 10-4-4L5 15z" />

                                                </svg>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        No instructors found.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>