@props(['name' => null, 'type' => 'error'])

@if ($name)
    @error($name)
        <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
    @enderror
@endif

@if (session('success'))
    <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
        {{ session('error') }}
    </div>
@endif
