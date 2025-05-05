@props([
    'hiddenId' => 'hidden-input',
    'inputId' => 'autocomplete-input',
    'inputName' => 'autocomplete-name',
    'suggestionsId' => 'suggestions-list',
    'hiddenName' => 'hidden_value',
    'placeholder' => 'Buscar...',
    'containerClass' => 'relative',
    'inputClass' => 'w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300',
    'suggestionsClass' => 'absolute bg-white border border-gray-300 w-full rounded shadow-lg mt-1 hidden max-h-48 overflow-y-auto z-50',
    'hiddenValue' => '',
    'inputValue' => '',
])

<div {{ $attributes->merge(['class' => $containerClass]) }}>
    <input
        type="hidden"
        id="{{ $hiddenId }}"
        name="{{ $hiddenName }}"
        value="{{ $hiddenValue }}"
    />
    <input
        type="text"
        id="{{ $inputId }}"
        placeholder="{{ $placeholder }}"
        class="{{ $inputClass }}"
        name="{{ $inputName }}"
        value="{{ $inputValue }}"
        autocomplete="off"
    />
    <ul
        id="{{ $suggestionsId }}"
        class="{{ $suggestionsClass }}"
    ></ul>
</div>
