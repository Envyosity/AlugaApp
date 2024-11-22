<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    /**
     * Exibe a lista de todos os imóveis, com opção de pesquisa.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Se houver uma palavra-chave de pesquisa, realiza a busca
        if ($query) {
            $imoveis = Imoveis::where('des_nome', 'LIKE', "%{$query}%")
                ->orWhere('des_cidade', 'LIKE', "%{$query}%")
                ->orWhere('des_endereco', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // Caso contrário, recupera todos os imóveis
            $imoveis = Imoveis::all();
        }

        // Retorna a view index passando a variável $imoveis e a palavra-chave
        return view('imoveis.index', compact('imoveis', 'query'));
    }

    /**
     * Exibe o formulário para criar um novo imóvel.
     */
    public function create()
    {
        return view('create_imovel');
    }

    /**
     * Armazena um novo imóvel no banco de dados.
     */
    public function store(Request $request)
    {
        $imovel = new Imoveis();

        // Mapeando os campos do formulário para as colunas do banco de dados
        $imovel->des_nome = $request->input('nome');
        $imovel->num_valor = $request->input('valor');
        $imovel->num_tamanho = $request->input('tamanho');
        $imovel->des_informacoes = $request->input('informacoes');
        $imovel->des_endereco = $request->input('endereco');
        $imovel->des_bairro = $request->input('bairro');
        $imovel->des_cidade = $request->input('cidade');
        $imovel->des_estado = $request->input('estado');
        $imovel->des_pais = $request->input('pais'); // Certifique-se de capturar este campo

        $imovel->save();

        return redirect()->route('imoveis.index')->with('msg', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um imóvel específico.
     */
    public function show(string $id)
    {
        if (!is_numeric($id)) {
            return response()->json([
                'success' => false,
                'message' => 'ID inválido fornecido.',
            ]);
        }

        $imovel = Imoveis::find($id);

        if ($imovel) {
            return view('imoveis.show')->with('imovel', $imovel);
        } else {
            return view('imoveis.show')->with('msg', 'Imóvel não encontrado!');
        }
    }

    /**
     * Exibe o formulário de edição de um imóvel específico.
     */
    public function edit(string $id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('imoveis.index')->with('msg', 'ID inválido fornecido.');
        }

        $imovel = Imoveis::find($id);

        if ($imovel) {
            return view('imoveis.edit')->with('imovel', $imovel);
        } else {
            return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
        }
    }

    /**
     * Atualiza um imóvel no banco de dados.
     */
    public function update(Request $request, string $id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('imoveis.index')->with('msg', 'ID inválido fornecido.');
        }

        $imovel = Imoveis::find($id);

        if (!$imovel) {
            return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
        }

        // Atualizando os campos
        $imovel->des_nome = $request->input('nome');
        $imovel->num_valor = $request->input('valor');
        $imovel->num_tamanho = $request->input('tamanho');
        $imovel->des_informacoes = $request->input('informacoes');
        $imovel->des_endereco = $request->input('endereco');
        $imovel->des_bairro = $request->input('bairro');
        $imovel->des_cidade = $request->input('cidade');
        $imovel->des_estado = $request->input('estado');
        $imovel->des_pais = $request->input('pais'); // Atualiza o campo des_pais

        $imovel->save();

        return redirect()->route('imoveis.index')->with('msg', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Remove um imóvel do banco de dados.
     */
    public function destroy(string $id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('imoveis.index')->with('msg', 'ID inválido fornecido.');
        }

        $imovel = Imoveis::find($id);

        if ($imovel) {
            $imovel->delete();

            return redirect()->route('imoveis.index')->with('msg', 'Imóvel excluído com sucesso!');
        } else {
            return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
        }
    }
}
