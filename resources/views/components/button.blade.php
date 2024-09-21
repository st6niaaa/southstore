@props([
    'type', 'href',
    'target' => null,
    'color' => null
])

@php
    $href   = $href ?? null;
    $target = is_string($target) ? $target : $attributes->get('wire:click');
@endphp

@if($href)
    <a
        href="{{ $href }}"
        @if($target) target="{{ $target }}" @endif
        {{ $attributes->merge(['class' => "justify-center focus:outline-none  font-medium rounded-lg transition duration-100 ease-in-out py-2 px-6"]) }}
    >
        {{ $slot }}
    </a>
@else
    <button type="{{ $type ?? 'button' }}" formnovalidate="" wire:loading.attr="disabled"
        @if($target)
            wire:target="{{ $target }}"
        @endif
        {{
            $attributes->class([
                'flex justify-center items-center gap-2 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2',
                'rounded-md' => !\Illuminate\Support\Str::contains($attributes->get('class'), 'rounded-'),
                'shadow-sm' => !\Illuminate\Support\Str::contains($attributes->get('class'), 'shadow'),
                'text-sm' => !\Illuminate\Support\Str::contains($attributes->get('class'), 'text-'),
                'py-2 px-4' => !\Illuminate\Support\Str::contains($attributes->get('class'), ['p-', 'px-', 'py-']),
                'group' => $target
            ])
        }}
    >
        <div class="flex items-center justify-center pointer-events-none">
            @if($target)
                <x-spinner class="mr-2" wire:loading.delay wire:target="{{ $target }}" />
            @endif
            <span>{{ $slot }}</span>
        </div>
    </button>
@endif