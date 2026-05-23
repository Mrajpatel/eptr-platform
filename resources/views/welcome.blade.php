<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ePTR</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    <nav class="bg-white border-b border-gray-200">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div class="text-2xl font-bold">
                ePTR
            </div>

            <div class="flex items-center gap-4">

                @auth

                    <a
                        href="{{ route('dashboard') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                    >
                        Dashboard
                    </a>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="text-gray-700 hover:text-black"
                    >
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                    >
                        Register
                    </a>

                @endauth

            </div>
        </div>
    </nav>

    <section class="min-h-[80vh] flex items-center">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

            <div>

                <h1 class="text-5xl font-bold leading-tight">
                    Modern Student & Instructor Management Platform
                </h1>

                <p class="mt-6 text-lg text-gray-600">
                    ePTR helps schools, instructors, and students manage training,
                    records, progress, and communication in one centralized system.
                </p>

                <div class="mt-8 flex gap-4">

                    <a
                        href="{{ route('register') }}"
                        class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700"
                    >
                        Get Started
                    </a>

                    <a
                        href="{{ route('login') }}"
                        class="px-6 py-3 border border-gray-300 rounded-xl hover:bg-gray-100"
                    >
                        Sign In
                    </a>

                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-10">

                <div class="space-y-6">

                    <div class="p-4 rounded-xl bg-blue-50">
                        <h3 class="font-semibold text-lg">
                            Student Portal
                        </h3>

                        <p class="text-gray-600 mt-1">
                            Manage training progress, schedules, and records.
                        </p>
                    </div>

                    <div class="p-4 rounded-xl bg-green-50">
                        <h3 class="font-semibold text-lg">
                            Instructor Dashboard
                        </h3>

                        <p class="text-gray-600 mt-1">
                            Track students, attendance, and evaluations.
                        </p>
                    </div>

                    <div class="p-4 rounded-xl bg-purple-50">
                        <h3 class="font-semibold text-lg">
                            School Administration
                        </h3>

                        <p class="text-gray-600 mt-1">
                            Centralized management for schools and organizations.
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </section>

</body>
</html>