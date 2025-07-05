<x-public-layout>
    <section class="py-12 overflow-hidden">
        <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-8 font-heading">Contact Me</h2>
        <div data-aos="fade-up" data-aos-delay="150"
            class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
            <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Have a question or want to work together? Fill
                out the form below.</p>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border @error('name') border-red-500 @enderror rounded-lg focus:outline-none focus:border-blue-500"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border @error('email') border-red-500 @enderror rounded-lg focus:outline-none focus:border-blue-500"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Message</label>
                    <textarea id="message" name="message" rows="5"
                        class="w-full px-3 py-2 border @error('message') border-red-500 @enderror rounded-lg focus:outline-none focus:border-blue-500"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-600 transition-colors duration-300">Send
                        Message</button>
                </div>
            </form>
        </div>
    </section>
</x-public-layout>
