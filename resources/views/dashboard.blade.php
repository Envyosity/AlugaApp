<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Imóveis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Olá, {{ Auth::user()->name }}! Bem-vindo ao Gerenciamento de Imóveis.</h3>

                    <!-- Botões de Ação -->
                    <div class="flex space-x-4">
                        <!-- Botão "Gerenciar Imóveis" -->
                        <a href="{{ route('imoveis.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md inline-flex items-center">
                            Gerenciar Imóveis
                        </a>
                    </div>

                    <!-- Conteúdo do Gerenciamento de Imóveis -->
                    <p class="mt-4">Aqui você pode gerenciar todos os imóveis cadastrados, editar, excluir ou adicionar novos imóveis conforme necessário.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
