<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
<h1>Welcome to the Home Page</h1>
<p>This is the home page of the Laravel application.</p>
<p>Here you can find links to other pages like About and Contact.</p>
<div class="mt-6">
    <h2 class="text-xl font-semibold">Available Jobs</h2>
    <ul class="mt-4 space-y-2">
        @foreach ($jobs as $job)
            <li class="p-4 bg-white shadow rounded-md">
                <h3 class="text-lg font-medium">{{ $job['title'] }}</h3>
                <p class="text-gray-600">Company: {{ $job['company'] }}</p>
            </li>
        @endforeach
    </ul>
</div>
</x-layout>
