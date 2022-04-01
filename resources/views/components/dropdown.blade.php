@props(['trigger'])
<div x-data="{ show: false }">
{{--Trigger--}}
    <div
        @click="show = !show"
         @click.away="show = false"
    >{{ $trigger }}
    </div>
{{--    Links   --}}

    <div x-show="show" class="px-2 absolute bg-white w-full mt-2 rounded-xl" style="display : none">
        {{ $slot }}
    </div>
</div>
