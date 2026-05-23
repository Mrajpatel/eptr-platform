<x-layouts.app>

    <div class="min-h-screen flex items-center justify-center px-6">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="mb-8 text-center">

                <h1 class="text-4xl font-bold text-gray-900">
                    ePTR
                </h1>

                <p class="mt-2 text-gray-500">
                    Student • Instructor • School Portal
                </p>
            </div>

            <form method="POST" action="#" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="you@example.com"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>

                    <a href="#" class="text-blue-600 hover:text-blue-700">
                        Forgot password?
                    </a>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200"
                >
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-gray-500">
                Don’t have an account?

                <a href="#" class="text-blue-600 font-medium hover:text-blue-700">
                    Contact your school
                </a>
            </div>
        </div>
    </div>

</x-layouts.app>