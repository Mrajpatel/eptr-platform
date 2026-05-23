<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-6 bg-gray-100">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="mb-8 text-center">

                <h1 class="text-4xl font-bold text-gray-900">
                    ePTR
                </h1>

                <p class="mt-2 text-gray-500">
                    Create a new password
                </p>

            </div>

            <form
                method="POST"
                action="{{ route('password.store') }}"
                class="space-y-6"
            >
                @csrf

                <!-- Reset Token -->
                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

                <!-- Email -->
                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email Address')"
                        class="mb-2"
                    />

                    <x-text-input
                        id="email"
                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        type="email"
                        name="email"
                        :value="old('email', $request->email)"
                        required
                        autofocus
                        autocomplete="username"
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
                        :value="__('New Password')"
                        class="mb-2"
                    />

                    <x-text-input
                        id="password"
                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
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
                        :value="__('Confirm Password')"
                        class="mb-2"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200"
                >
                    Reset Password
                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">

                Back to

                <a
                    href="{{ route('login') }}"
                    class="text-blue-600 font-medium hover:text-blue-700"
                >
                    Sign in
                </a>

            </div>

        </div>

    </div>

</x-guest-layout>