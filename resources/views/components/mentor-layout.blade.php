<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mentor Management' }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100">

    <!-- Navbar -->
    <nav class="bg-slate-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-4">

            <h1 class="text-2xl font-bold">
                Mentor Management
            </h1>

            <div class="flex gap-6">

                <a href="{{ route('mentor.index') }}" class="hover:text-blue-300 transition">
                    Home
                </a>
                <a href="{{ route('mentor.manage') }}" class="hover:text-blue-300 transition">
                    Mentors
                </a>

                <a href="/course" class="hover:text-blue-300 transition">
                    Courses
                </a>

            </div>

        </div>
    </nav>

    <!-- Header -->
    <header class="max-w-7xl mx-auto px-8 py-8">

        {{ $header ?? '' }}

    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-8 pb-10">

        {{ $slot }}

    </main>

</body>
</html>