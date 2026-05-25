<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Student
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Add a new student to your school
            </p>
        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form
                    method="POST"
                    action="{{ route('school.students.store') }}"
                    class="space-y-6"
                >
                    @csrf

                    <!-- Name -->
                    <div>

                        <x-input-label
                            for="name"
                            value="Full Name"
                        />

                        <x-text-input
                            id="name"
                            name="name"
                            type="text"
                            class="block mt-1 w-full"
                            :value="old('name')"
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
                            value="Email Address"
                        />

                        <x-text-input
                            id="email"
                            name="email"
                            type="email"
                            class="block mt-1 w-full"
                            :value="old('email')"
                            required
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Password -->
                    <div>

                        <x-input-label
                            for="password"
                            value="Password"
                        />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="block mt-1 w-full"
                            required
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Confirm Password -->
                    <div>

                        <x-input-label
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <x-text-input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="block mt-1 w-full"
                            required
                        />

                    </div>

                    <!-- Submit -->
                    <div class="pt-4 flex items-center gap-3 justify-end">
                        <a
                            href="{{ route('school.students.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                        >
                            Cancel
                        </a>
                        <x-primary-button>
                            Create Student
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>