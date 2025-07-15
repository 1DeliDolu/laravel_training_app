<x-layout>
    <x-slot:heading>
        Edit Profile
    </x-slot:heading>

    <x-form-error />

    <form class="mx-auto max-w-md" method="POST" action="/profile">
        @csrf
        @method('PUT')

        <x-form-field name="name" type="text" label="Name" required placeholder="Enter your name"
            :value="old('name', $user->name)" />

        <x-form-field name="email" type="email" label="Email" required placeholder="Enter your email address"
            :value="old('email', $user->email)" />

        <x-form-field name="password" type="password" label="New Password"
            placeholder="Enter new password (leave blank to keep current)" />

        <x-form-field name="password_confirmation" type="password" label="Confirm New Password"
            placeholder="Confirm new password" />

        <div class="flex items-center justify-between">
            <x-button type="submit" variant="primary">
                Update Profile
            </x-button>
            <x-button href="/" variant="link">
                Cancel
            </x-button>
        </div>
    </form>
</x-layout>
