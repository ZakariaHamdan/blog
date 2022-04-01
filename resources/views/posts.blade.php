<x-layout>
    <x-slot name="title">
        The Posts part
    </x-slot>
    <x-slot name="content">
        @foreach($posts as $post)
            <h1><a href="/posts/{{$post->slug}}"> {{$post->title}}</a></h1>
            <article><p>{{$post->excerpt}}</p>
                <div>
                    By <a href="/authors/{{$post->author->id}}">{{$post->author->username}}</a>
                    in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                    <a href="">hi</a>

                </div>
            </article>
            <hr style="height:5px; color:#1f253d; background-color:#264236">
        @endforeach
    </x-slot>
</x-layout>
