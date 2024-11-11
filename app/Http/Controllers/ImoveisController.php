<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{

  public function index()
  {
    //..recuperando os imoveis do banco de dados
    $imoveis = Imoveis::all();
    //..retorna a view index passando a variável $imoveis
    return view('imoveis.index')->with('imoveis', $imoveis);
  }


  public function create()
  {
    //..mostrando o formulário de cadastro
    return view('imoveis.create');
  }


  public function store(Request $request)
  {
    //..instancia um novo model Imovel
    $imoveis = new Imoveis();
    //..pega os dados vindos do form e seta no model
    $imoveis->nome = $request->input('nome');
    $imoveis->valor = $request->input('valor');
    $imoveis->tamanho = $request->input('tamanho');
    $imoveis->informacoes = $request->input('informacoes');
    $imoveis->endereco = $request->input('endereco');
    $imoveis->bairro = $request->input('bairro');
    $imoveis->cidade = $request->input('cidade');
    $imoveis->estado = $request->input('estado');
    $imoveis->pais = $request->input('pais');
    //..persiste o model na base de dados
    $imoveis->save();
    //..retorna a view com uma variável msg que será tratada na própria view
    $imoveis = Imoveis::all();
    return redirect()->route('imoveis.index');
  }


  public function show(string $id)
  {
    //..recupera o imovel da base de dados
    $imoveis = Imoveis::find($id);
    //..se encontrar o imovel, retorna a view com o objeto correspondente
    if ($imoveis) {
      return view('imoveis.show')->with('imoveis', $imoveis);
    } else {
      //..senão, retorna a view com uma mensagem que será exibida.
      return view('imoveis.show')->with('msg', 'Imóvel não encontrado!');
    }
  }


  public function edit(string $id)
  {
    //..recupera o imovel da base de dados
    $imoveis = Imoveis::find($id);
    //..se encontrar o imovel, retorna a view de ediçãcom com o objeto correspondente
    if ($imoveis) {
      return view('imoveis.edit')->with('imoveis', $imoveis);
    } else {
      //..senão, retorna a view de edição com uma mensagem que será exibida.
      $imoveis = Imoveis::all();
      return view('imoveis.index')->with('imoveis', $imoveis)
        ->with('msg', 'Imovel não encontrado!');
    }
  }


  public function update(Request $request, string $id)
  {
    //..recupera o imoveis mediante o id
    $imoveis = Imoveis::find($id);
    //..atualiza os atributos do objeto recuperado com os dados do objeto Request
    $imoveis->nome = $request->input('nome');
    $imoveis->valor = $request->input('valor');
    $imoveis->tamanho = $request->input('tamanho');
    $imoveis->informacoes = $request->input('informacoes');
    $imoveis->endereco = $request->input('endereco');
    $imoveis->bairro = $request->input('bairro');
    $imoveis->cidade = $request->input('cidade');
    $imoveis->estado = $request->input('estado');
    $imoveis->pais = $request->input('pais');
    //..persite as alterações na base de dados
    $imoveis->save();
    //..retorna a view index com uma mensagem
    $imoveis = Imoveis::all();
    return view('imoveis.index')->with('imoveis', $imoveis)
      ->with('msg', 'Imovel atualizado com sucesso!');
  }


  public function destroy(string $id)
  {
    //..recupeara o recurso a ser excluído
    $imoveis = Imoveis::find($id);
    //..exclui o recurso
    $imoveis->delete();
    //..retorna à view index.
    $imoveis = Imoveis::all();
    return view('imoveis.index')->with('imoveis', $imoveis)
      ->with('msg', "S excluído com sucesso!");
  }
}
