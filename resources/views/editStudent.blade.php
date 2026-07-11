<x-student-layout>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-slate-800">
                Edit Student
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

        <form
            action="/student/{{ $student->id }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $student->name }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ $student->email }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Age
                </label>

                <input
                    type="number"
                    name="age"
                    value="{{ $student->age }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('age')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Current Image -->
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Current Image
                </label>

                <img
                    src="{{ asset('storage/' . $student->image) }}"
                    alt="{{ $student->name }}"
                    class="w-28 h-28 rounded-full object-cover border"
                >

            </div>

            <!-- New Image -->
            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">
                    Change Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                >
                @error('image')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

                <p class="text-sm text-gray-500 mt-2">
                    Leave this empty if you don't want to change the image.
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition"
                >
                    Update Student
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