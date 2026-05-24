<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Students
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    View and manage student training
                </p>
            </div>

            <a
                href="{{ route('school.students.create') }}"
                class="inline-flex items-center px-5 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 transition"
            >
                Add Student
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
                                    Student
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Email
                                </th>

                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($students as $student)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        {{ $student->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $student->email }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="2" class="px-6 py-10 text-center text-gray-500">
                                        No students assigned.
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