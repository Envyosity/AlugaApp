<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Gerenciar Imóveis</title>
</head>
<body>
    <div class="location">
        <form action="{{ route('imoveis.index') }}" method="GET">
            <input type="text" id="query" name="query" placeholder="Digite sua pesquisa por Nome, Cidade ou Endereço...">
            <button type="submit">Pesquisar</button>
        </form>
        <form action="{{ route('imoveis.create') }}">
            <button type="submit">Criar Imovel</button>
        </form>
    </div>

    @if (session('msg'))
        <p style="color: green;">{{ session('msg') }}</p>
    @endif

    @if($imoveis->isEmpty())
        <p>Nenhum imóvel encontrado.</p>
    
    @else
    <div class="container">
        <div class="list-container">
            <div class="left-col">
            @foreach ($imoveis as $imovel)
                <div class="house">
                    <div class="house-img">
                        <a href="house.html"><img src="images/image-s1.png"></a>
                    </div>
                    <div class="house-info">
                        <p>Condominio XPTO</p>
                        <h3>{{ $imovel->des_nome }}</h3>
                        <p>{{ $imovel->des_informacoes }}</p>
                        <div class="house-price">
                            <h4>R$ {{ number_format($imovel->num_valor, 2, ',', '.') }} <span>/ Noite</span></h4>
                            
                            <a href="{{ route('imoveis.show', $imovel->idt_imovel) }}"
                                class="text-blue-500 hover:text-blue-700">Ver Imovel</a>
                                
                            <a href="{{ route('imoveis.edit', $imovel->idt_imovel) }}"
                                class="text-yellow-500 hover:text-yellow-700">Editar</a>

                            <!-- Formulário de Exclusão -->
                            <form action="{{ route('imoveis.destroy', $imovel->idt_imovel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir {{ $imovel->des_nome }}?')" class="text-red-500 hover:text-red-700">Excluir</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</body>
</html>