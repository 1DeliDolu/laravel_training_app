<x-layout>
    <x-slot:heading>
        Create New User
    </x-slot:heading>

    <x-form-error name="name" />
    <x-form-error name="email" />
    <x-form-error name="password" />
    {{-- Eğer rol seçimi olacaksa --}}
    {{-- <x-form-error name="role" /> --}}

    <form class="mx-auto max-w-md" method="POST" action="/users">
        @csrf

        <x-form-field name="name" type="text" label="Name" required placeholder="Enter user name" />

        <x-form-field name="email" type="email" label="Email" required placeholder="Enter email address" />

        <x-form-field name="password" type="password" label="Password" required placeholder="Enter password" />
        <x-form-field name="password_confirmation" type="password" label="Confirm Password" required placeholder="Confirm password" />

        {{-- Eğer rol seçimi olacaksa aşağıdaki satırı ekleyebilirsiniz --}}
        {{--
        <x-form-field name="role" type="text" label="Role" placeholder="Enter user role" />
        --}}

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Create User
            </x-button>
            <x-button href="/auth" variant="link">
                Cancel
            </x-button>
        </div>
    </form>
</x-layout>
