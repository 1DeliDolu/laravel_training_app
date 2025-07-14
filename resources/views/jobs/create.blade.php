<x-layout>
    <x-slot:heading>
        Create New Job
    </x-slot:heading>

    <form class="mx-auto max-w-md" method="POST" action="/jobs">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="title">Job Title</label>
            <input
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                id="title" name="title" type="text" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
            <textarea
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                id="description" name="description" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="company">Company</label>
            <input
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                id="company" name="company" type="text" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="salary">Salary</label>
            <input
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                id="salary" name="salary" type="text" required>
        </div>

        <div class="flex items-center justify-between">
            <button
                class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                type="submit">
                Create Job
            </button>
            <a class="text-blue-500 hover:text-blue-700" href="/">Cancel</a>
        </div>
    </form>
</x-layout>
