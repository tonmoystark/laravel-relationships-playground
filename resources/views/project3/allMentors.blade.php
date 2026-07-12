<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                All Mentors
            </h2>

            <a
                href="{{ route('mentor.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                + Add Mentor
            </a>

        </div>

    </x-slot:header>

    @if ($mentors->count())

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($mentors as $mentor)

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">

                    <!-- Card Header -->
                    <div class="bg-blue-600 h-24"></div>

                    <!-- Profile Image -->
                    <div class="flex justify-center">
                        <img
                            src="{{ asset('storage/' . $mentor->image) }}"
                            alt="Mentor"
                            class="w-24 h-24 rounded-full border-4 border-white object-cover -mt-12"
                        >
                    </div>

                    <!-- Mentor Information -->
                    <div class="p-6 text-center">

                        <h3 class="text-2xl font-bold text-slate-800">
                            {{ $mentor->name }}
                        </h3>

                        <p class="text-slate-500 mt-2">
                            {{ $mentor->email }}
                        </p>

                        <p class="text-slate-600 mt-2">
                            💼 {{ $mentor->job_title }}
                        </p>

                        <a
                            href="/mentor/{{ $mentor->id }}"
                            class="inline-block mt-6 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                        >
                            View Details
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">

            <h3 class="text-2xl font-bold text-slate-700">
                No Mentors Found
            </h3>

            <p class="text-slate-500 mt-3">
                There are no mentors available yet.
            </p>

            <a
                href="/mentor/create"
                class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Add First Mentor
            </a>

        </div>

    @endif

</x-mentor-layout>