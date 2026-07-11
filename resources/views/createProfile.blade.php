<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Create Student Profile
            </h2>

            <a
                href="/student/{{ $student->id }}"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>
        </div>
    </x-slot:header>

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

        <!-- Student Info -->
        <div class="mb-8 bg-slate-100 rounded-xl p-5">

            <h3 class="text-xl font-bold text-slate-800">
                Student Information
            </h3>

            <div class="mt-4 space-y-2">

                <p>
                    <span class="font-semibold">Name:</span>
                    {{ $student->name }}
                </p>

                <p>
                    <span class="font-semibold">Email:</span>
                    {{ $student->email }}
                </p>

                <p>
                    <span class="font-semibold">Age:</span>
                    {{ $student->age }}
                </p>

            </div>

        </div>

        <form action="/student/{{ $student->id }}/profile" method="POST">

            @csrf

            <!-- Phone -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter phone number"
                >
                @error('phone')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter address"
                ></textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Guardian Name -->
            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Guardian Name
                </label>

                <input
                    type="text"
                    name="guardian_name"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter guardian name"
                >
                @error('guardian_name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
                >
                    Save Profile
                </button>

                <a
                    href="/student/{{ $student->id }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-student-layout>