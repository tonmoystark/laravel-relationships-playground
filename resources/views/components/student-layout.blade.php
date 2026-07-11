<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Student Management' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-white">
                Student Management
            </h1>

            <div class="flex items-center gap-6 text-white">

                <a href="/student" class="hover:text-blue-200 transition">
                    Home
                </a>
                <a href="/student/data" class="hover:text-blue-200 transition">
                    Student Data
                </a>

                <a href="/student/create" class="hover:text-blue-200 transition">
                    Add Student
                </a>

            </div>

        </div>
    </nav>

    <!-- Header -->
    <header class="max-w-7xl mx-auto px-6 py-8">
        @isset($header)
            {{ $header }}
        @endisset
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 pb-10">
        {{ $slot }}
    </main>

</body>
</html>