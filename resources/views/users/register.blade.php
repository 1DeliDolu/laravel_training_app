<x-layout>
    <x-slot:heading>
        Register New Account
    </x-slot:heading>

    <x-form-error />

    <form class="mx-auto max-w-md" method="POST" action="/register">
        @csrf

        <x-form-field name="name" type="text" label="Name" required placeholder="Enter your name" />

        <x-form-field name="email" type="email" label="Email" required placeholder="Enter your email" />

        <x-form-field name="password" type="password" label="Password" required placeholder="Enter password" />

        <x-form-field name="password_confirmation" type="password" label="Confirm Password" required
            placeholder="Confirm password" />

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Register
            </x-button>
            <x-button href="/login" variant="link">
                Already have an account? Login
            </x-button>
        </div>
    </form>
</x-layout>
