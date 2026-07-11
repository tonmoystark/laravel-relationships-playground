<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Students
            </h2>

            <a
                href="/student/create"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                + Add Student
            </a>
        </div>
    </x-slot:header>

    @if ($students->count())

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($students as $student)

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="flex justify-center">
                        <img
                            src="{{ asset('storage/' . $student->image) }}"
                            alt="{{ $student->name }}"
                            class="w-24 h-24 rounded-full object-cover"
                        >
                    </div>

                    <div class="text-center mt-4">

                        <h3 class="text-xl font-bold text-slate-800">
                            {{ $student->name }}
                        </h3>

                        <p class="text-slate-500 mt-2">
                            {{ $student->email }}
                        </p>

                        <p class="text-slate-600 mt-2">
                            Age: {{ $student->age }}
                        </p>

                    </div>

                    <div class="mt-6 flex justify-center">
                        <a
                            href="/student/{{ $student->id }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                        >
                            View Details
                        </a>
                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-xl shadow-md p-10 text-center">

            <h3 class="text-2xl font-semibold text-slate-700">
                No Students Found
            </h3>

            <p class="text-slate-500 mt-3">
                There are no students in the system yet.
            </p>

            <a
                href="/student/create"
                class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Add Your First Student
            </a>

        </div>

    @endif

</x-student-layout>