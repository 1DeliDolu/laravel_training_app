<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    {{-- Edit form should use PUT method, not PATCH --}}
    <form class="mx-auto max-w-md" method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PUT')

        <x-form-field name="title" type="text" value="{{ $job->title }}" label="Job Title" required
            placeholder="Enter job title" />

        <x-form-field name="description" type="textarea" value="{{ $job->description }}" label="Description"
            rows="4" placeholder="Enter job description" />

        <x-form-field name="company" type="text" value="{{ $job->company }}" label="Company" required
            placeholder="Enter company name" />

        <x-form-field name="salary" type="number" value="{{ $job->salary }}" label="Salary (USD)" required
            min="0" step="0.01" placeholder="Enter salary amount" />

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Update Job
            </x-button>
            <x-button href="/jobs/{{ $job->id }}" variant="link">
                Cancel
            </x-button>
        </div>
    </form>
</x-layout>
