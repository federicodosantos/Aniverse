@props(['name', 'label' => null])

<div>
    @if ($label)
        <label for="{{ $name }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    @endif
    <input id="{{ $name }}" name="{{ $name }}" type="file" {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>
    @error($name) <span class="text-red-600">{{ $message }}</span> @enderror
</div>
