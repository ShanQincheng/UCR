<link href="{{ asset('css/app.css?version=1') }}" rel="stylesheet">

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{route('home')}}">
                Join UCR
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first-name" :value="__('First Name')" />

                <x-input id="first-name" class="block mt-1 w-full" type="text" name="first-name" :value="old('first-name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div>
                <x-label for="last-name" :value="__('Last Name')" />

                <x-input id="last-name" class="block mt-1 w-full" type="text" name="last-name" :value="old('last-name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('Mobile Number')" />

                <x-input id="mobile" class="block mt-1 w-full" type="tel" name="mobile" :value="old('mobile')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
