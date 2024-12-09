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

        // Verifica se há algum texto no campo de pesquisa
        if ($query) {
            $imoveis = Imoveis::where('des_nome', 'ILIKE', "%{$query}%")
                ->orWhere('des_cidade', 'ILIKE', "%{$query}%")
                ->orWhere('des_endereco', 'ILIKE', "%{$query}%")
                ->get();
        } else {
            // Se não houver pesquisa, exibe todos os imóveis
            $imoveis = Imoveis::all();
        }

        return view('imoveis.index', compact('imoveis', 'query'));
    }


    /**
     * Exibe o formulário para criar um novo imóvel.
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Armazena um novo imóvel no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'des_nome' => 'required|string|max:255',
            'num_valor' => 'required|numeric',
            'num_tamanho' => 'required|numeric',
            'des_informacoes' => 'nullable|string',
            'des_endereco' => 'required|string',
            'des_bairro' => 'required|string',
            'des_cidade' => 'required|string',
            'des_estado' => 'required|string',
            'des_pais' => 'required|string',
        ]);

        // Criação do imóvel com os dados validados
        Imoveis::create($validated);

        return redirect()->route('imoveis.index')->with('msg', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um imóvel específico.
     */
    public function show(string $id)
    {
        // Verifica se o ID fornecido é válido
        $imovel = Imoveis::find($id);
        if ($imovel) {
            return view('imoveis.show', compact('imovel'));
        }
        return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
    }

    /**
     * Exibe o formulário de edição de um imóvel específico.
     */
    public function edit(string $id)
    {
        // Verifica se o imóvel existe
        $imovel = Imoveis::find($id);
        if ($imovel) {
            return view('imoveis.edit', compact('imovel'));
        }
        return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
    }

    /**
     * Atualiza um imóvel no banco de dados.
     */
    public function update(Request $request, string $id)
    {
        // Verifica se o imóvel existe
        $imovel = Imoveis::find($id);
        if ($imovel) {
            $validated = $request->validate([
                'des_nome' => 'required|string|max:255',
                'num_valor' => 'required|numeric',
                'num_tamanho' => 'required|numeric',
                'des_informacoes' => 'nullable|string',
                'des_endereco' => 'required|string',
                'des_bairro' => 'required|string',
                'des_cidade' => 'required|string',
                'des_estado' => 'required|string',
                'des_pais' => 'required|string',
            ]);

            // Atualiza os dados do imóvel
            $imovel->update($validated);

            return redirect()->route('imoveis.index')->with('msg', 'Imóvel atualizado com sucesso!');
        }
        return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
    }

    /**
     * Remove um imóvel do banco de dados.
     */
    public function destroy(string $id)
    {
        // Verifica se o imóvel existe
        $imovel = Imoveis::find($id);
        if ($imovel) {
            // Exclui o imóvel
            $imovel->delete();
            return redirect()->route('imoveis.index')->with('msg', 'Imóvel excluído com sucesso!');
        }
        return redirect()->route('imoveis.index')->with('msg', 'Imóvel não encontrado!');
    }

    /**
     * Pesquisa imóveis com base em uma palavra-chave.
     */
    public function search(Request $request)
    {
        // Teste com um valor fixo para garantir que a consulta funciona
        $query = 'Casa';  // Teste com qualquer valor fixo

        // Realiza a busca
        $imoveis = Imoveis::where('des_nome', 'ILIKE', "%{$query}%")
            ->orWhere('des_cidade', 'ILIKE', "%{$query}%")
            ->orWhere('des_endereco', 'ILIKE', "%{$query}%")
            ->get();

        return view('imoveis.index', compact('imoveis', 'query'));
    }

}
