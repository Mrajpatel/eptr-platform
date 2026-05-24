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
                href="#"
                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl text-white font-semibold shadow-sm transition duration-200"
            >
                Add Instructor
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

                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($instructors as $student)

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