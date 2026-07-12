<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                Course Details
            </h2>

            <a
                href="{{ route('course.allCourses') }}"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>

        </div>

    </x-slot:header>

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Top Bar -->
            <div class="bg-blue-600 h-24"></div>

            <div class="p-8">

                <!-- Course Information -->
                <div>

                    <h1 class="text-3xl font-bold text-slate-800">
                        {{ $course->name }}
                    </h1>

                    <p class="text-slate-500 mt-6 leading-relaxed">
                        {{ $course->description }}
                    </p>

                    <div class="mt-6 pt-6 border-t">

                        <p class="text-slate-700">
                            <span class="font-semibold">
                                Start Date:
                            </span>

                            {{ \Carbon\Carbon::parse($course->start_date)->format('d M, Y') }}
                        </p>

                    </div>

                </div>

                <!-- Mentors -->
                <div class="mt-10">

                    <h3 class="text-xl font-bold text-slate-800 mb-4">
                        Mentors Teaching This Course
                    </h3>

                    @if ($course->mentors->count())

                        <div class="space-y-3">

                            @foreach ($course->mentors as $mentor)

                                <div class="flex items-center justify-between bg-slate-100 rounded-lg p-4">

                                    <div>

                                        <h4 class="font-semibold text-slate-800">
                                            {{ $mentor->name }}
                                        </h4>

                                        <p class="text-sm text-slate-500">
                                            {{ $mentor->email }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">

                            <p class="text-yellow-700">
                                No mentors have been assigned to this course yet.
                            </p>

                        </div>

                    @endif

                </div>

                <!-- Buttons -->
                <div class="mt-10 flex gap-4">

                    <a
                        href="{{ route('course.edit', $course->id) }}"
                        class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition"
                    >
                        Edit Course
                    </a>

                    <form
                        action="{{ route('course.destroy', $course->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Are you sure you want to delete this course?')"
                            class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition"
                        >
                            Delete Course
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-mentor-layout>