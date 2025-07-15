<x-layout>
    <x-slot:heading>
        Login to Your Account
    </x-slot:heading>

    <x-form-error />

    <form class="mx-auto max-w-md" method="POST" action="/login">
        @csrf

        <x-form-field name="email" type="email" label="Email" required placeholder="Enter your email" />

        <x-form-field name="password" type="password" label="Password" required placeholder="Enter your password" />

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Login
            </x-button>
            <x-button href="/register" variant="link">
                Don't have an account? Register
            </x-button>
        </div>
    </form>
</x-layout>
