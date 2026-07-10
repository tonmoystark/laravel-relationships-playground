<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Add New Student
            </h2>

            <a
                href="/student"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>
        </div>
    </x-slot:header>

    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-8">

        <form action="/student/store" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- Name -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Enter student's name"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter student's email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Age -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Age
                </label>

                <input
                    type="number"
                    name="age"
                    placeholder="Enter student's age"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            {{-- images --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>
            <!-- Buttons -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
                >
                    Save Student
                </button>

                <a
                    href="/student"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-student-layout>