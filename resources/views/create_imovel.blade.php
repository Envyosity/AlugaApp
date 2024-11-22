<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Imóvel</title>
</head>
<body>
    <h1>Criar Novo Imóvel</h1>

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
</body>
</html>
