<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <x-form-error />

    <h2 class="text-lg font-bold">{{ $job->title }}</h2>

    <p>
        <strong>Company:</strong> {{ $job->company }}
    </p>

    <p>
        <strong>Description:</strong> {{ $job->description }}
    </p>

    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    <div class="mt-6 flex gap-4">
        <x-button href="/jobs/{{ $job->id }}/edit" variant="primary">
            Edit Job
        </x-button>
        <form action="/jobs/{{ $job->id }}" method="POST"
            onsubmit="return confirm('Emin misiniz? Bu işi silmek istediğinizden emin misunuz?');">
            @csrf
            @method('DELETE')
            <x-button type="submit" variant="danger">
                Delete
            </x-button>
        </form>
    </div>
</x-layout>
