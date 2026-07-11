<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Student Data
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

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-blue-600 text-white">

                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-center">Profile</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($students as $student)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $student->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $student->email }}
                            </td>
 <!-- Profile Status -->
            <td class="px-6 py-4 text-center">

                @if ($student->profile)

                    <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                        Available
                    </span>

                @else

                    <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                        Not Created
                    </span>

                @endif

            </td>
                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-3">

                                    <a
                                        href="/student/{{ $student->id }}/edit"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="/student/{{ $student->id }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition"
                                            onclick="return confirm('Are you sure you want to delete this student?')"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="bg-white rounded-xl shadow-lg p-10 text-center">

            <h3 class="text-2xl font-semibold text-slate-700">
                No Students Found
            </h3>

            <p class="text-slate-500 mt-3">
                There are no student records available.
            </p>

            <a
                href="/student/create"
                class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Add First Student
            </a>

        </div>

    @endif

</x-student-layout>