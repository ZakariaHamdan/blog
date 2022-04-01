<x-layout>
    <x-slot name="title">
        {{$posts[0]->author->username}}
    </x-slot>
    <x-slot name="content">
        <div>Posts by {{$posts[0]->author->username}}</div>
        @foreach($posts as $post)
            <h1><a href="/posts/{{$post->slug}}"> {{$post->title}}</a></h1>
            <article><p>{{$post->excerpt}}</p>
                <div>
                    in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </div>
            </article>
            <hr style="height:5px; color:#1f253d; background-color:#264236">
        @endforeach

    </x-slot>
</x-layout>
