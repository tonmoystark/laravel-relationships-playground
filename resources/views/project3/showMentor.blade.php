<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                Mentor Details
            </h2>

            <a
                href="{{ route('mentor.index') }}"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>

        </div>

    </x-slot:header>

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Cover -->
            <div class="bg-blue-600 h-32"></div>

            <div class="px-8 pb-8">

                <!-- Profile Image -->
                <div class="flex justify-center">

                    <img
                        src="{{ asset('storage/' . $mentor->image) }}"
                        alt="{{ $mentor->name }}"
                        class="w-36 h-36 rounded-full border-4 border-white object-cover -mt-16"
                    >

                </div>

                <!-- Basic Information -->
                <div class="text-center mt-5">

                    <h1 class="text-3xl font-bold text-slate-800">
                        {{ $mentor->name }}
                    </h1>

                    <p class="text-slate-500 mt-2">
                        {{ $mentor->email }}
                    </p>

                </div>

                <!-- Mentor Information -->
                <div class="mt-10">

                    <h3 class="text-xl font-bold text-slate-800 mb-5">
                        Mentor Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="bg-slate-100 rounded-lg p-4">
                            <span class="font-semibold">Phone:</span>
                            {{ $mentor->phone }}
                        </div>

                        <div class="bg-slate-100 rounded-lg p-4">
                            <span class="font-semibold">Job Title:</span>
                            {{ $mentor->job_title }}
                        </div>

                    </div>

                </div>

                <!-- Assigned Courses -->
                <div class="mt-10">

                    <h3 class="text-xl font-bold text-slate-800 mb-5">
                        Assigned Courses
                    </h3>

                    @if($mentor->courses->count())

                        <div class="space-y-3">

                            @foreach($mentor->courses as $course)

                                <div class="flex justify-between items-center bg-blue-50 border border-blue-100 rounded-lg p-4">

                                    <div>

                                        <h4 class="font-semibold text-slate-800">
                                            {{ $course->name }}
                                        </h4>

                                        <p class="text-sm text-slate-500">
                                            Starts:
                                            {{ \Carbon\Carbon::parse($course->start_date)->format('d M, Y') }}
                                        </p>

                                    </div>

                                    <form action="{{ route('mentor.unassignCourse', [$mentor->id, $course->id]) }}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button
                                        type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition"
                                    >
                                        Remove
                                </button>
                                    </form>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-5">

                            <p class="text-yellow-700">
                                No courses have been assigned yet.
                            </p>

                        </div>

                    @endif

                </div>

                <!-- Assign Course -->
                <div class="mt-10">

    <h3 class="text-xl font-bold text-slate-800 mb-2">
        Manage Assigned Courses
    </h3>

    <p class="text-slate-500 mb-6">
        Select the courses you want this mentor to teach.
    </p>

    <form
        action="{{ route('mentor.syncCourse', $mentor->id) }}"
        method="POST"
    >

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @foreach ($courses as $course)

                <label
                    class="flex items-center justify-between border rounded-xl p-4 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition"
                >

                    <div>

                        <h4 class="font-semibold text-slate-800">
                            {{ $course->name }}
                        </h4>

                        <p class="text-sm text-slate-500">
                            Starts:
                            {{ \Carbon\Carbon::parse($course->start_date)->format('d M, Y') }}
                        </p>

                    </div>

                    <input
                        type="checkbox"
                        name="courses[]"
                        value="{{ $course->id }}"
                        class="w-5 h-5"

                        @checked(
                            $mentor->courses->contains($course->id)
                        )

                    >

                </label>

            @endforeach

        </div>

        <div class="mt-8 flex justify-end">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition"
            >
                Update Courses
            </button>

        </div>

    </form>

</div>
                <!-- Bottom Buttons -->
                <div class="mt-10 flex gap-4">

                    <a
                        href="{{ route('mentor.edit', $mentor->id) }}"
                        class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition"
                    >
                        Edit Mentor
                    </a>

                    <form
                        action="{{ route('mentor.destroy', $mentor->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this mentor?')"
                            class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition"
                        >
                            Delete Mentor
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-mentor-layout>