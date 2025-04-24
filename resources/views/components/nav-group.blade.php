{{-- resources/views/components/nav-group.blade.php --}}
@props(['label', 'icon'])

<li>
    <details class="group">
        <summary class="flex items-center p-2 cursor-pointer text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            <x-icon name="{{ $icon }}" />
            <span class="ms-3">{{ $label }}</span>
        </summary>
        <ul class="pl-6 mt-2 space-y-2 text-sm text-gray-600 dark:text-gray-300">
            {{ $slot }}
        </ul>
    </details>
</li>
