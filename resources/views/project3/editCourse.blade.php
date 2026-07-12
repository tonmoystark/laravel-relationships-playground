<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                Edit Course
            </h2>

            <a
                href="{{ route('course.allCourses') }}"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>

        </div>

    </x-slot:header>

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

        <form
            action="{{ route('course.update', $course->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <!-- Course Name -->
            <div class="mb-6">

                <label
                    for="name"
                    class="block text-slate-700 font-semibold mb-2"
                >
                    Course Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $course->name) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Description -->
            <div class="mb-6">

                <label
                    for="description"
                    class="block text-slate-700 font-semibold mb-2"
                >
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                >{{ old('description', $course->description) }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Start Date -->
            <div class="mb-8">

                <label
                    for="start_date"
                    class="block text-slate-700 font-semibold mb-2"
                >
                    Start Date
                </label>

                <input
                    type="date"
                    id="start_date"
                    name="start_date"
                    value="{{ old('start_date', $course->start_date) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('start_date')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition"
                >
                    Update Course
                </button>

                <a
                    href="{{ route('course.show', $course->id) }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-mentor-layout>