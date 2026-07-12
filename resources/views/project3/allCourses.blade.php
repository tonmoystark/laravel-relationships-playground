<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                All Courses
            </h2>

            <a
                href="{{ route('course.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-300"
            >
                + Add Course
            </a>

        </div>

    </x-slot:header>

    @if ($courses->count())

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($courses as $course)

                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">

                    <!-- Top Bar -->
                    <div class="h-3 bg-blue-600"></div>

                    <div class="p-6 flex flex-col h-full">

                        <!-- Course Name -->
                        <h3 class="text-2xl font-bold text-slate-800">
                            {{ $course->name }}
                        </h3>

                        <!-- Description -->
                        <p class="text-slate-500 mt-4 leading-relaxed flex-grow">
                            {{ Str::limit($course->description, 120) }}
                        </p>

                        <!-- Start Date -->
                        <div class="mt-6 border-t pt-4">

                            <p class="text-slate-600">
                                <span class="font-semibold">
                                    Starts:
                                </span>

                                {{ \Carbon\Carbon::parse($course->start_date)->format('d M, Y') }}
                            </p>

                        </div>

                        <!-- Button -->
                        <div class="mt-6">

                            <a
                                href="{{ route('course.show', $course->id) }}"
                                class="w-full block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
                            >
                                View Details
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">

            <h3 class="text-3xl font-bold text-slate-700">
                No Courses Found
            </h3>

            <p class="text-slate-500 mt-4">
                Start by creating your first course.
            </p>

            <a
                href="{{ route('course.create') }}"
                class="inline-block mt-8 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
            >
                + Add First Course
            </a>

        </div>

    @endif

</x-mentor-layout>