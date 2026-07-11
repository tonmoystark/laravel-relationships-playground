<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Student Details
            </h2>

            <a
                href="/student"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>
        </div>
    </x-slot:header>

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Banner -->
        <div class="h-32 bg-blue-600"></div>

        <div class="px-8 pb-8">

            <!-- Image -->
            <div class="flex justify-center">
                <img
                    src="{{ asset('storage/' . $student->image) }}"
                    alt="{{ $student->name }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-white -mt-16"
                >
            </div>

            <!-- Student Information -->
            <div class="text-center mt-4">

                <h2 class="text-3xl font-bold text-slate-800">
                    {{ $student->name }}
                </h2>

                <p class="text-slate-500 mt-2">
                    {{ $student->email }}
                </p>

                <p class="text-slate-600 mt-2">
                    Age: {{ $student->age }}
                </p>

            </div>

            <!-- Profile Section -->
            <div class="mt-10">

                <h3 class="text-2xl font-bold text-slate-800 mb-5">
                    Student Profile
                </h3>

                @if ($student->profile)

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="bg-slate-100 rounded-lg p-4">
                            <p class="font-semibold text-slate-700">
                                Phone
                            </p>

                            <p class="text-slate-600 mt-2">
                                {{ $student->profile->phone }}
                            </p>
                        </div>

                        <div class="bg-slate-100 rounded-lg p-4">
                            <p class="font-semibold text-slate-700">
                                Guardian Name
                            </p>

                            <p class="text-slate-600 mt-2">
                                {{ $student->profile->guardian_name }}
                            </p>
                        </div>

                        <div class="bg-slate-100 rounded-lg p-4 md:col-span-2">
                            <p class="font-semibold text-slate-700">
                                Address
                            </p>

                            <p class="text-slate-600 mt-2">
                                {{ $student->profile->address }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-6">
                        <a
                            href="/student/{{ $student->id }}/profile/edit"
                            class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition"
                        >
                            Edit Profile
                        </a>
                    </div>

                @else

                    <div class="bg-yellow-50 border border-yellow-300 rounded-xl p-6 text-center">

                        <h4 class="text-xl font-semibold text-yellow-700">
                            Profile Not Found
                        </h4>

                        <p class="text-slate-600 mt-2">
                            This student doesn't have a profile yet.
                        </p>

                        <a
                            href="/student/{{ $student->id }}/profile/create"
                            class="inline-block mt-5 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
                        >
                            Create Profile
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-student-layout>