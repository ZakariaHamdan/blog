<x-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left"
            style="display: inline-flex;"
        >{{ ucwords( $currentcat->name ?? 'categories' )}}
            <x-down-arrow class="absolute pointer-events-none" />
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('category','page')) }}"
                     :active="!request('category')"
    >All
    </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
                         :active="isset( $currentcat) && $currentcat->is($category)"
        >{{ ucwords( $category->name )}}
        </x-dropdown-item>
    @endforeach
    <x-dropdown-item>
        bloodyhell
    </x-dropdown-item>
</x-dropdown>
