<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciar Imóveis</title>
    <style>
        /* Customizações adicionais para melhorar o design */
        .location {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .location button {
            margin-left: 10px;
        }

        .container {
            padding-top: 20px;
        }

        .house {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
        }

        .house-img img {
            max-width: 100%;
            border-radius: 8px;
        }

        .house-info h3 {
            color: #333;
        }

        .house-price h4 {
            color: #007bff;
        }

        .house-info p {
            color: #666;
        }

        /* Estilo dos botões */
        .btn-custom {
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Cor dos botões */
        .btn-ver, .btn-editar, .btn-excluir {
            padding: 6px 12px;
            font-size: 12px;
            font-weight: normal;
        }

        .btn-ver {
            background-color: #28a745;
            color: white;
        }

        .btn-ver:hover {
            background-color: #218838;
        }

        .btn-editar {
            background-color: #000;
            color: white;
        }

        .btn-editar:hover {
            background-color: #333;
        }

        .btn-excluir {
            background-color: #dc3545;
            color: white;
        }

        .btn-excluir:hover {
            background-color: #c82333;
        }

        /* Botões de Pesquisar e Criar */
        .btn-pesquisar, .btn-criar {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 30px;
            text-transform: uppercase;
            font-weight: bold;
            background-color: #007bff;
            color: white;
        }

        .btn-pesquisar:hover, .btn-criar:hover {
            background-color: #0056b3;
        }

        /* Botão Voltar */
        .btn-voltar {
            background-color: transparent;
            color: #6c757d;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid #6c757d;
            border-radius: 20px;
        }

        .btn-voltar:hover {
            background-color: #f8f9fa;
        }

        /* Aumentar o campo de pesquisa */
        .form-control {
            height: 45px;
            font-size: 16px;
        }

        /* Ajuste de layout */
        .house-info p, .house-price h4 {
            font-size: 14px;
        }

        .house-info h3 {
            font-size: 18px;
        }

        /* Título "Imóveis" */
        .page-title {
            font-family: 'Georgia', serif;
            font-size: 36px;
            color: #333;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Alinhar os botões "Ver", "Editar" e "Excluir" */
        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons .btn {
            font-size: 12px;
            padding: 6px 12px;
        }

        .action-buttons .btn-ver {
            background-color: #28a745;
            color: white;
        }

        .action-buttons .btn-editar {
            background-color: #000;
            color: white;
        }

        .action-buttons .btn-excluir {
            background-color: #dc3545;
            color: white;
        }

        /* Ajuste para os botões de pesquisa e criação ficarem mais próximos */
        .location form {
            display: flex;
            gap: 10px; /* Menos espaço entre os botões */
        }

        .location form button {
            margin-left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título -->
        <div class="page-title">Imóveis</div>

        <div class="location">
            <!-- Botão de Voltar -->
            <a href="#" class="btn btn-voltar"><i class="bi bi-arrow-left"></i> Voltar</a>

            <!-- Formulário de Pesquisa -->
            <form action="{{ route('imoveis.index') }}" method="GET" class="d-flex w-75">
                <input type="text" id="query" name="query" class="form-control me-2" placeholder="Digite sua pesquisa por Nome, Cidade ou Endereço...">
                <button type="submit" class="btn btn-pesquisar">Pesquisar</button>
            </form>

            <!-- Botão de Criar Imóvel -->
            <form action="{{ route('imoveis.create') }}" class="d-flex">
                <button type="submit" class="btn btn-criar">Criar Imóvel</button>
            </form>
        </div>

        @if (session('msg'))
            <p class="text-success">{{ session('msg') }}</p>
        @endif

        @if($imoveis->isEmpty())
            <p>Nenhum imóvel encontrado.</p>
        @else
        <div class="row">
            @foreach ($imoveis as $imovel)
            <div class="col-md-4">
                <div class="house">
                    <div class="house-img">
                        <a href="house.html"><img src="images/image-s1.png" alt="Imagem do Imóvel"></a>
                    </div>
                    <div class="house-info">
                        <p><strong>Condomínio:</strong> XPTO</p>
                        <h3>{{ $imovel->des_nome }}</h3>
                        <p>{{ $imovel->des_informacoes }}</p>
                        <div class="house-price">
                            <h4>R$ {{ number_format($imovel->num_valor, 2, ',', '.') }} <span>/ Noite</span></h4>
                        </div>
                        <div class="action-buttons">
                            <!-- Botões alinhados -->
                            <a href="{{ route('imoveis.show', $imovel->idt_imovel) }}" class="btn btn-ver">Ver</a>
                            <a href="{{ route('imoveis.edit', $imovel->idt_imovel) }}" class="btn btn-editar">Editar</a>
                            <form action="{{ route('imoveis.destroy', $imovel->idt_imovel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir {{ $imovel->des_nome }}?')" class="btn btn-excluir">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
