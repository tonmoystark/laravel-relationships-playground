<x-mentor-layout>

    <x-slot:header>

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-slate-800">
                Edit Mentor
            </h2>

            <a
                href="{{ route('mentor.index') }}"
                class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition"
            >
                Back
            </a>

        </div>

    </x-slot:header>

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

        <form
            action="{{ route('mentor.update', $mentor->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $mentor->name) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Email -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $mentor->email) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Phone -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $mentor->phone) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('phone')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Job Title -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Job Title
                </label>

                <input
                    type="text"
                    name="job_title"
                    value="{{ old('job_title', $mentor->job_title) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('job_title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Current Image -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Current Image
                </label>

                <img
                    src="{{ asset('storage/' . $mentor->image) }}"
                    alt="{{ $mentor->name }}"
                    class="w-28 h-28 rounded-full object-cover border"
                >

            </div>

            <!-- New Image -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Change Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                >

                <p class="text-sm text-gray-500 mt-2">
                    Leave this empty if you don't want to change the image.
                </p>

                @error('image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition"
                >
                    Update Mentor
                </button>

                <a
                    href="{{ route('mentor.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-mentor-layout>