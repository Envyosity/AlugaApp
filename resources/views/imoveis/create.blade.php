<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Imóvel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('imoveis.store') }}" method="POST">
                        @csrf
                        <!-- Formulário de criação de imóvel -->
                        <div class="mb-4">
                            <label for="des_nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                            <input type="text" id="des_nome" name="des_nome" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="num_valor" class="block text-sm font-medium text-gray-700">Valor:</label>
                            <input type="number" id="num_valor" name="num_valor" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="num_tamanho" class="block text-sm font-medium text-gray-700">Tamanho:</label>
                            <input type="number" id="num_tamanho" name="num_tamanho" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="des_informacoes" class="block text-sm font-medium text-gray-700">Informações:</label>
                            <textarea id="des_informacoes" name="des_informacoes"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="des_endereco" class="block text-sm font-medium text-gray-700">Endereço:</label>
                            <input type="text" id="des_endereco" name="des_endereco" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="des_bairro" class="block text-sm font-medium text-gray-700">Bairro:</label>
                            <input type="text" id="des_bairro" name="des_bairro" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="des_cidade" class="block text-sm font-medium text-gray-700">Cidade:</label>
                            <input type="text" id="des_cidade" name="des_cidade" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="des_estado" class="block text-sm font-medium text-gray-700">Estado:</label>
                            <input type="text" id="des_estado" name="des_estado" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="des_pais" class="block text-sm font-medium text-gray-700">País:</label>
                            <input type="text" id="des_pais" name="des_pais" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Botões de Criar Imóvel e Voltar -->
                        <div class="flex justify-between items-center mt-4">
                            <button type="submit"
                                    class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">
                                Criar Imóvel
                            </button>

                            <!-- Botão de Voltar -->
                            <a href="{{ route('imoveis.index') }}"
                               class="text-gray-500 hover:text-gray-700 text-sm">
                                Voltar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
