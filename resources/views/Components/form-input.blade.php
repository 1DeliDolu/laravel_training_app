@props(['type' => 'text', 'name', 'id' => '', 'value' => '', 'required' => false, 'rows' => null])

@if ($type === 'textarea')
    <textarea id="{{ $id ?: $name }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500']) }}
        rows="{{ $rows ?: 4 }}" {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
@else
    <input id="{{ $id ?: $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500']) }}
        {{ $required ? 'required' : '' }}>
@endif
