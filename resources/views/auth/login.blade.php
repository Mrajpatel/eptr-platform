<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-6 bg-gray-100">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="mb-8 text-center">

                <h1 class="text-4xl font-bold text-gray-900">
                    ePTR
                </h1>

                <p class="mt-2 text-gray-500">
                    Student • Instructor • School Portal
                </p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                        :value="old('email')"
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
                        :value="__('Password')"
                        class="mb-2"
                    />

                    <x-text-input
                        id="password"
                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 text-gray-600">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            name="remember"
                        >

                        Remember me

                    </label>

                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-blue-600 hover:text-blue-700"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200"
                >
                    Sign In
                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">

                Don’t have an account?

                <a
                    href="{{ route('register') }}"
                    class="text-blue-600 font-medium hover:text-blue-700"
                >
                    Create account
                </a>

            </div>

        </div>

    </div>

</x-guest-layout>