<x-layout>
    <main class="max-w-lg mx-auto mt-10 bg-green-100 p-6 border border-cadetblue rounded-xl">
        <h1 class="text-center font-bold text-xl mb-10">Log in</h1>

        <form method="POST" action="/login">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="username"
                >Username
                </label>

                <input class="border border-gray-700 p-2 w-full"
                       type="text"
                       name="username"
                       id="username"
                       value="{{ old('username') }}"
                       required
                >
                @error('username')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="password"
                >Password
                </label>

                <input class="border border-gray-700 p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
                       required
                >
                @error('password')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror

            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Log In
                </button>
            </div>
        </form>

    </main>
</x-layout>
