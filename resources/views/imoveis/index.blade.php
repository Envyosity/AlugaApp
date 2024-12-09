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
                            <p>2 Hóspedes</p>
                            <h4>R$ {{ number_format($imovel->num_valor, 2, ',', '.') }} <span>/ Noite</span></h4>
                            <form action="{{ route('imoveis.index', ['id' => $imovel->id]) }}" method="GET">
                            <button type="submit" class="btn btn-primary" id="query">Ver Detalhes</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</body>
</html>
