<x-layout>
    <x-slot:heading>
        Create New Job
    </x-slot:heading>

    {{-- Example usage of the form-error component --}}
    {{-- Replace 'field_name' with the actual field you want to show errors for --}}
    <x-form-error name="field_name" />

    <form class="mx-auto max-w-md" method="POST" action="/jobs">
        @csrf

        <x-form-field name="title" type="text" label="Job Title" required placeholder="Enter job title" />

        <x-form-field name="description" type="textarea" label="Description" rows="4"
            placeholder="Enter job description" />

        <x-form-field name="company" type="text" label="Company" required placeholder="Enter company name" />

        <div class="mb-4">
            <x-form-label for="salary">Salary (USD)</x-form-label>
            <div class="relative mt-1">
                <x-form-input class="pr-12" name="salary" type="number" required min="0" step="0.01" />
                <span
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">$</span>
            </div>
            @error('salary')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Create Job
            </x-button>
            <x-button href="/jobs" variant="link">
                Cancel
            </x-button>
        </div>
    </form>
</x-layout>
