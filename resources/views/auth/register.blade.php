<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nome -->
        <div>
            <x-input-label for="des_nome" :value="__('Nome')" />
            <x-text-input id="des_nome" class="block mt-1 w-full" type="text" name="des_nome" :value="old('des_nome')" required autofocus />
            <x-input-error :messages="$errors->get('des_nome')" class="mt-2" />
        </div>

        <!-- E-mail -->
        <div class="mt-4">
            <x-input-label for="des_email" :value="__('E-mail')" />
            <x-text-input id="des_email" class="block mt-1 w-full" type="email" name="des_email" :value="old('des_email')" required />
            <x-input-error :messages="$errors->get('des_email')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="des_cpf" :value="__('CPF')" />
            <x-text-input id="des_cpf" class="block mt-1 w-full" type="text" name="des_cpf" :value="old('des_cpf')" required />
            <x-input-error :messages="$errors->get('des_cpf')" class="mt-2" />
        </div>

        <!-- Número de Celular -->
        <div class="mt-4">
            <x-input-label for="des_numero_celular" :value="__('Número de Celular')" />
            <x-text-input id="des_numero_celular" class="block mt-1 w-full" type="text" name="des_numero_celular" :value="old('des_numero_celular')" required />
            <x-input-error :messages="$errors->get('des_numero_celular')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmação da Senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Registrar-se') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
