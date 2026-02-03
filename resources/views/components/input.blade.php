@props(['label', 'name', 'value' => ''])

<div>
    <label class="text-sm font-medium">{{ $label }}</label>
    <input
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="mt-1 w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary"
        required
    >
</div>
