<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Imóveis</title>
</head>
<body>
    <h1>Gerenciar Imóveis</h1>

    <!-- Formulário para Criar um Novo Imóvel -->
    <h2>Criar Novo Imóvel</h2>
    <form action="{{ route('imoveis.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" placeholder="Ex: Casa Moderna" required><br><br>

        <label for="valor">Valor:</label><br>
        <input type="number" id="valor" name="valor" step="0.01" placeholder="Ex: 300000" required><br><br>

        <label for="tamanho">Tamanho (m²):</label><br>
        <input type="number" id="tamanho" name="tamanho" placeholder="Ex: 120" required><br><br>

        <label for="informacoes">Informações:</label><br>
        <textarea id="informacoes" name="informacoes" placeholder="Ex: Casa com 3 quartos, garagem..." rows="4" required></textarea><br><br>

        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" placeholder="Ex: Rua A, Nº 123" required><br><br>

        <label for="bairro">Bairro:</label><br>
        <input type="text" id="bairro" name="bairro" placeholder="Ex: Centro" required><br><br>

        <label for="cidade">Cidade:</label><br>
        <input type="text" id="cidade" name="cidade" placeholder="Ex: São Paulo" required><br><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" placeholder="Ex: SP" required><br><br>

        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais" placeholder="Ex: Brasil" required><br><br>

        <button type="submit">Criar Imóvel</button>
    </form>

    <hr>

    <!-- Formulário para Pesquisar Imóveis -->
    <h2>Pesquisar Imóveis</h2>
    <form action="{{ route('imoveis.index') }}" method="GET">
        <label for="query">Buscar por Nome, Cidade ou Endereço:</label><br>
        <input type="text" id="query" name="query" placeholder="Digite sua pesquisa...">
        <button type="submit">Pesquisar</button>
    </form>

    <hr>

    <!-- Listagem de Imóveis -->
    <h2>Lista de Imóveis</h2>
    @if (session('msg'))
        <p style="color: green;">{{ session('msg') }}</p>
    @endif

    @if($imoveis->isEmpty())
        <p>Nenhum imóvel encontrado.</p>
    @else
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Tamanho</th>
                    <th>Informações</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>País</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->idt_imovel }}</td>
                        <td>{{ $imovel->des_nome }}</td>
                        <td>R$ {{ number_format($imovel->num_valor, 2, ',', '.') }}</td>
                        <td>{{ $imovel->num_tamanho }} m²</td>
                        <td>{{ $imovel->des_informacoes }}</td>
                        <td>{{ $imovel->des_endereco }}</td>
                        <td>{{ $imovel->des_bairro }}</td>
                        <td>{{ $imovel->des_cidade }}</td>
                        <td>{{ $imovel->des_estado }}</td>
                        <td>{{ $imovel->des_pais }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <hr>

    <!-- Formulário para Excluir um Imóvel -->
    <h2>Excluir Imóvel</h2>
    <form action="" method="POST" id="form-excluir">
        @csrf
        @method('DELETE')
        <label for="idExcluir">ID do Imóvel para Excluir:</label><br>
        <input type="number" id="idExcluir" name="idExcluir" placeholder="Digite o ID" required><br><br>
        <button type="button" onclick="excluirImovel()">Excluir Imóvel</button>
    </form>

    <script>
        function excluirImovel() {
            const id = document.getElementById('idExcluir').value;
            if (id) {
                const form = document.getElementById('form-excluir');
                form.action = `/imoveis/${id}`;
                form.submit();
            } else {
                alert('Por favor, insira o ID do imóvel para excluir.');
            }
        }
    </script>

    <hr>

    <!-- Formulário para Atualizar um Imóvel -->
    <h2>Atualizar Imóvel</h2>
    <form action="" method="POST" id="form-atualizar">
        @csrf
        @method('PUT')

        <label for="idAtualizar">ID do Imóvel para Atualizar:</label><br>
        <input type="number" id="idAtualizar" name="idAtualizar" placeholder="Digite o ID" required><br><br>

        <label for="nomeAtualizar">Novo Nome:</label><br>
        <input type="text" id="nomeAtualizar" name="nome" placeholder="Digite o Novo Nome"><br><br>

        <label for="valorAtualizar">Novo Valor:</label><br>
        <input type="number" id="valorAtualizar" name="valor" step="0.01" placeholder="Digite o Novo Valor"><br><br>

        <label for="tamanhoAtualizar">Novo Tamanho (m²):</label><br>
        <input type="number" id="tamanhoAtualizar" name="tamanho" placeholder="Digite o Novo Tamanho"><br><br>

        <label for="informacoesAtualizar">Novas Informações:</label><br>
        <textarea id="informacoesAtualizar" name="informacoes" placeholder="Digite as Novas Informações"></textarea><br><br>

        <label for="enderecoAtualizar">Novo Endereço:</label><br>
        <input type="text" id="enderecoAtualizar" name="endereco" placeholder="Digite o Novo Endereço"><br><br>

        <label for="bairroAtualizar">Novo Bairro:</label><br>
        <input type="text" id="bairroAtualizar" name="bairro" placeholder="Digite o Novo Bairro"><br><br>

        <label for="cidadeAtualizar">Nova Cidade:</label><br>
        <input type="text" id="cidadeAtualizar" name="cidade" placeholder="Digite a Nova Cidade"><br><br>

        <label for="estadoAtualizar">Novo Estado:</label><br>
        <input type="text" id="estadoAtualizar" name="estado" placeholder="Digite o Novo Estado"><br><br>

        <label for="paisAtualizar">Novo País:</label><br>
        <input type="text" id="paisAtualizar" name="pais" placeholder="Digite o Novo País"><br><br>

        <button type="button" onclick="atualizarImovel()">Atualizar Imóvel</button>
    </form>

    <script>
        function atualizarImovel() {
            const id = document.getElementById('idAtualizar').value;
            if (id) {
                const form = document.getElementById('form-atualizar');
                form.action = `/imoveis/${id}`;
                form.submit();
            } else {
                alert('Por favor, insira o ID do imóvel para atualizar.');
            }
        }
    </script>
</body>
</html>
