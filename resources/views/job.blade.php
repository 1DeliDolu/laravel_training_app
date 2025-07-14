<x-layout>
    <x-slot:heading>
        <div class="flex items-center justify-between">
            <span>Job Listings</span>
            <a class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700" href="/jobs/create">
                Create New Job
            </a>
        </div>
    </x-slot:heading>

    @if (session('success'))
        <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="block rounded-lg border border-gray-200 px-4 py-6" href="/jobs/{{ $job['id'] }}/show">

                <div class="text-sm font-bold text-blue-500">
                    {{ $job->company ?? 'No Company' }}
                </div>

                <div>
                    <strong>{{ $job['title'] }}</strong> Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach
        {{ $jobs->links() }}
    </div>
</x-layout>
