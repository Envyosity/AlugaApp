<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Detalhes</title>
</head>
<body>
<div class="house-details">
        <div class="house-title">
            <h1>Imóvel em {{ old('des_cidade', $imovel->des_cidade) }}</h1>
        </div>
        <div class="gallery">
            <div class="gallery-img-1"><img src="{{ asset('images/house-1.png') }}"></div>
            <div><img src="{{ asset('images/house-2.png') }}"></div>
            <div><img src="{{ asset('images/house-3.png') }}"></div>
            <div><img src="{{ asset('images/house-4.png') }}"></div>
            <div><img src="{{ asset('images/house-5.png') }}"></div>
        </div>
        <div class="small-details">
            <h2>{{ old('des_nome', $imovel->des_nome) }}</h2>
            <p>{{ old('des_informacoes', $imovel->des_informacoes) }}</p>
            <h4>R$ {{ old('num_valor', $imovel->num_valor) }} / Noite</h4>
        </div>
        <hr class="line">
        <form class="check-form">
            <div>
                <label>Check-in</label>
                <input type="text" placeholder="Data de entrada">
            </div>
            <div>
                <label>Check-out</label>
                <input type="text" placeholder="Data de saida">
            </div>
            <div class="guest-field">
                <label>Hóspede</label>
                <input type="text" placeholder="2 hóspedes">
            </div>
            <button type="submit">Reservar</button>
        </form>

        <h2>Descrição</h2><br>
        <p class="home-desc">Aconchegante imóvel em {{ old('des_cidade', $imovel->des_cidade) }}-{{ old('des_estado', $imovel->des_estado) }}. 
            Desfrute de um espaço moderno e confortável, perfeito para estadias curtas ou longas em {{ old('des_cidade', $imovel->des_cidade) }}. 
            O imóvel está localizado na tranquila {{ old('des_endereco', $imovel->des_endereco) }}, a poucos minutos de universidades, restaurantes e opções de lazer...</p>
        <hr class="line">

        <h2>Onde você estará</h2><br>
        <h4>Lajeado, Rio Grande do Sul, Brasil</h4><br>

        <hr class="line">

        <div class="host">
            <div>
                <h2>Anfitriã - Laura S</h2>
                <p>Entrou em 2019.</p>
            </div>
        </div>
    </div>
</body>
</html>