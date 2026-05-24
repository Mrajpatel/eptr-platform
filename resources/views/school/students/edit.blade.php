<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Student
        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form
                    method="POST"
                    action="{{ route('school.students.update', $student) }}"
                    class="space-y-6"
                >

                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>

                        <x-input-label
                            for="name"
                            :value="__('Name')"
                        />

                        <x-text-input
                            id="name"
                            name="name"
                            type="text"
                            class="block mt-1 w-full"
                            :value="old('name', $student->name)"
                            required
                        />

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Email -->
                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email')"
                        />

                        <x-text-input
                            id="email"
                            name="email"
                            type="email"
                            class="block mt-1 w-full"
                            :value="old('email', $student->email)"
                            required
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Status -->
                    <div>

                        <x-input-label
                            for="is_active"
                            :value="__('Status')"
                        />

                        <select
                            id="is_active"
                            name="is_active"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                        >
                            <option value="1" {{ $student->is_active ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ !$student->is_active ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>

                        <x-input-error
                            :messages="$errors->get('is_active')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">

                        <x-primary-button>
                            Update Student
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>