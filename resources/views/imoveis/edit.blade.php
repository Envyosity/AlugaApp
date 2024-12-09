<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Imóvel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Formulário de Edição -->
                    <h2 class="mb-4">Editar Imóvel - {{ $imovel->des_nome }}</h2>

                    <form action="{{ route('imoveis.update', $imovel->idt_imovel) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Usando PUT para atualização -->

                        <div class="mb-4">
                            <label for="nome" class="block">Nome:</label>
                            <input type="text" id="nome" name="des_nome" value="{{ old('des_nome', $imovel->des_nome) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="valor" class="block">Valor:</label>
                            <input type="number" id="valor" name="num_valor" value="{{ old('num_valor', $imovel->num_valor) }}" required step="0.01" class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="tamanho" class="block">Tamanho (m²):</label>
                            <input type="number" id="tamanho" name="num_tamanho" value="{{ old('num_tamanho', $imovel->num_tamanho) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="informacoes" class="block">Informações:</label>
                            <textarea id="informacoes" name="des_informacoes" rows="4" class="border p-2 w-full rounded">{{ old('des_informacoes', $imovel->des_informacoes) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="endereco" class="block">Endereço:</label>
                            <input type="text" id="endereco" name="des_endereco" value="{{ old('des_endereco', $imovel->des_endereco) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="bairro" class="block">Bairro:</label>
                            <input type="text" id="bairro" name="des_bairro" value="{{ old('des_bairro', $imovel->des_bairro) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="cidade" class="block">Cidade:</label>
                            <input type="text" id="cidade" name="des_cidade" value="{{ old('des_cidade', $imovel->des_cidade) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="estado" class="block">Estado:</label>
                            <input type="text" id="estado" name="des_estado" value="{{ old('des_estado', $imovel->des_estado) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="mb-4">
                            <label for="pais" class="block">País:</label>
                            <input type="text" id="pais" name="des_pais" value="{{ old('des_pais', $imovel->des_pais) }}" required class="border p-2 w-full rounded">
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md">Atualizar Imóvel</button>
                            <a href="{{ route('imoveis.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a> <!-- Botão de Voltar -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
