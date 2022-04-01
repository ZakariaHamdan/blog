@auth()
    <x-box class=" bg-gray-100">
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt ="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">add comment</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring rounded-xl"
                    rows="5"
                    placeholder="Write comment here"
                    required
                ></textarea>
                @error('body')
                    <span class="text-xs text-red-500">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="flex justify-end mt-3 pt-3 border-t-2 border-gray-300">
                <x-button-submit>
                    Post
                </x-button-submit>
            </div>

        </form>
    </x-box>
@else
    <p>
        <a href="/register" class="text-blue-600 font-semibold underline text-xl border">Register</a>
        or
        <a href="/login" class="text-blue-600 font-semibold underline text-xl border">Log in</a>
        to comment.
    </p>
@endauth
