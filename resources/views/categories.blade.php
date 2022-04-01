<x-layout>
    <x-slot name="title">
        Categories Page
    </x-slot>
    <x-slot name="content">
        @foreach($cats as $cat)
            <h1><a href="/categories/{{$cat->slug}}">{{$cat->name}}</a></h1>
        @endforeach
    </x-slot>
</x-layout>
