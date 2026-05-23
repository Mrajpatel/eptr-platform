<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-6 bg-gray-100">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="mb-8 text-center">

                <h1 class="text-4xl font-bold text-gray-900">
                    ePTR
                </h1>

                <p class="mt-2 text-gray-500">
                    Reset your password
                </p>

            </div>

            <div class="mb-6 text-sm text-gray-600 leading-relaxed">

                Forgot your password? Enter your email address below
                and we’ll send you a password reset link.

            </div>

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form
                method="POST"
                action="{{ route('password.email') }}"
                class="space-y-6"
            >
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
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200"
                >
                    Send Reset Link
                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">

                Remembered your password?

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