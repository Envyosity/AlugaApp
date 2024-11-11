<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="des_cpf" :value="__('CPF')" />
            <x-text-input maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);"  id="des_cpf" class="remove-arrow block mt-1 w-full" type="text" name="des_cpf" :value="old('des_cpf')" required autocomplete="des_cpf" />
            <x-input-error :messages="$errors->get('des_cpf')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="des_phone" :value="__('Telefone')" />
            <x-text-input maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);"  id="des_phone" class="remove-arrow block mt-1 w-full" type="text" name="des_phone" :value="old('des_phone')" required autocomplete="des_phone" />
            <x-input-error :messages="$errors->get('des_phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já Registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<style>
    .remove-arrow::-webkit-inner-spin-button,
    .remove-arrow::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .remove-arrow {
        -moz-appearance: textfield;
    }
</style>