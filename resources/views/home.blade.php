<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="block rounded-lg border border-gray-200 px-4 py-6" href="/jobs/{{ $job['id'] }}">

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
