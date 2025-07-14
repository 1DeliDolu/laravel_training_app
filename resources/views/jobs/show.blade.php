<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="mx-auto max-w-3xl">
        <div class="rounded-lg bg-white p-6 shadow-md">
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h1>
                <p class="text-lg font-medium text-blue-600">{{ $job->company ?? 'No Company' }}</p>
            </div>

            <div class="mb-6">
                <h2 class="mb-2 text-lg font-semibold text-gray-700">Salary</h2>
                <p class="text-gray-900">${{ number_format($job->salary) }} per year</p>
            </div>

            @if ($job->description)
                <div class="mb-6">
                    <h2 class="mb-2 text-lg font-semibold text-gray-700">Description</h2>
                    <p class="leading-relaxed text-gray-900">{{ $job->description }}</p>
                </div>
            @endif

            <div class="flex items-center justify-between border-t pt-4">
                <a class="text-blue-500 hover:text-blue-700" href="/job">
                    ← Back to Jobs
                </a>
                <div class="text-sm text-gray-500">
                    Posted on {{ $job->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
