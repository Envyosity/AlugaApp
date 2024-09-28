<x-guest-layout>
    <!-- Sessão de Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo de E-mail -->
        <div>
            <x-input-label for="des_email" :value="__('E-mail')" />
            <x-text-input id="des_email" class="block mt-1 w-full" type="email" name="des_email" :value="old('des_email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('des_email')" class="mt-2" />
        </div>

        <!-- Campo de Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Checkbox de "Lembre de mim" -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Lembre de mim') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Conecte-se') }}
            </x-primary-button>
        </div>

        <!-- Link para Registro -->
        <div class="flex items-center justify-center mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Registrar-se') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
