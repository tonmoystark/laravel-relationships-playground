<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                Mentor Data
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

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-blue-600 text-white">

                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($mentors as $mentor)

                        <tr class="border-b hover:bg-slate-50">

                            <td class="px-6 py-4">
                                {{ $mentor->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $mentor->email }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-3">

                                    <a
                                        {{-- href="{{ route('mentor.edit', $mentor->id) }}" --}}
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        {{-- action="{{ route('mentor.destroy', $mentor->id) }}" --}}
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition"
                                            onclick="return confirm('Are you sure you want to delete this mentor?')"
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

        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">

            <h3 class="text-2xl font-bold text-slate-700">
                No Mentors Found
            </h3>

            <p class="text-slate-500 mt-3">
                There are no mentor records available.
            </p>

            <a
                href="{{ route('mentor.create') }}"
                class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Add First Mentor
            </a>

        </div>

    @endif

</x-mentor-layout>