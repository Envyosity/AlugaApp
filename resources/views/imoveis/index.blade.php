<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Imóveis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Mensagem de Sucesso -->
                    @if (session('msg'))
                        <p class="text-green-500">{{ session('msg') }}</p>
                    @endif

                    <!-- Botão para Criar Novo Imóvel e Botão de Voltar -->
                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('imoveis.create') }}"
                            class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-md">
                            Criar Novo Imóvel
                        </a>

                        <!-- Botão de Voltar (alinhado à direita) -->
                        <a href="{{ route('dashboard') }}"
                           class="text-gray-500 hover:text-gray-700 text-sm">
                            Voltar
                        </a>
                    </div>

                    <hr class="my-4">

                    <!-- Formulário de Pesquisa -->
                    <h2>Pesquisar Imóveis</h2>
                    <form action="{{ route('imoveis.index') }}" method="GET">
                        <label for="query">Buscar por Nome, Cidade ou Endereço:</label><br>
                        <input type="text" id="query" name="query" placeholder="Digite sua pesquisa..."
                            class="border p-2 rounded" value="{{ request()->query('query') }}">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Pesquisar</button>
                    </form>

                    <hr class="my-4">

                    <!-- Lista de Imóveis -->
                    <h2>Lista de Imóveis</h2>
                    @if ($imoveis->isEmpty())
                        <p>Nenhum imóvel encontrado.</p>
                    @else
                        <table border="1" cellspacing="0" cellpadding="10" class="w-full">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                    <th>Tamanho</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($imoveis as $imovel)
                                    <tr>
                                        <td>{{ $imovel->idt_imovel }}</td>
                                        <td>{{ $imovel->des_nome }}</td>
                                        <td>R$ {{ number_format($imovel->num_valor, 2, ',', '.') }}</td>
                                        <td>{{ $imovel->num_tamanho }} m²</td>
                                        <td>{{ $imovel->des_endereco }}</td>
                                        <td>{{ $imovel->des_cidade }}</td>
                                        <td>{{ $imovel->des_estado }}</td>
                                        <td class="flex space-x-2">
                                            <!-- Botão Editar -->
                                            <a href="{{ route('imoveis.edit', $imovel->idt_imovel) }}"
                                                class="text-yellow-500 hover:text-yellow-700">Editar</a>

                                            <!-- Formulário de Exclusão -->
                                            <form action="{{ route('imoveis.destroy', $imovel->idt_imovel) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')"
                                                    class="text-red-500 hover:text-red-700">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
