<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

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
        <a class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
            href="/jobs/{{ $job->id }}/edit">Edit Job</a>
        <form action="/jobs/{{ $job->id }}" method="POST" onsubmit="return confirm('Emin misiniz? Bu işi silmek istediğinizden emin misunuz?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
            Delete
            </button>
        </form>
    </div>
</x-layout>
