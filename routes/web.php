<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Candidato;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/cadastrar-candidato', function (Request $dados) {
    Candidato::create([   //comando para subir para o banco os seguintes dados:
        'nome'=> $dados->nome_candidato,  //nome do dado na tabela => $a request vindo do Front -> especificando o dado obtido no input
        'telefone'=> $dados->telefone_candidato
    ]);
    echo "Candidato criado com sucesso";
   // dd($dados->all()) comando deploy die para mostrar os dados e finalizar a funcao;

    
});

Route::get('/mostrar-candidato/{id_do_candidato}',function ($id_do_candidato) {
        // dd(Candidato::find($id_do_candidato)); //Busca a partir do ID na url para obter um objeto de dados
       $candidato = Candidato::findOrFail($id_do_candidato); // faz a mesma busca porem caso n encontrado nao ira responder nulo, mas sim um erro
       echo $candidato-> nome;
       echo $candidato -> telefone;
});

Route::get('/editar-candidato/{id_do_candidato}',function ($id_do_candidato) {
    // dd(Candidato::find($id_do_candidato)); //Busca a partir do ID na url para obter um objeto de dados
   $candidato = Candidato::findOrFail($id_do_candidato); // faz a mesma busca porem caso n encontrado nao ira responder nulo, mas sim um erro
   return view('editar_candidato',['candidato' => $candidato]);

});

Route::put('/atualizar-candidato/{id_do_candidato}',function (Request $dados, $id_do_candidato) {
        // dd(Candidato::find($id_do_candidato)); //Busca a partir do ID na url para obter um objeto de dados
       $candidato = Candidato::findOrFail($id_do_candidato);
       $candidato->nome = $dados->nome_candidato; //atribuindo o dado do campo para o nome ja cadastrado
       $candidato->telefone = $dados->telefone_candidato; //atribuindo o dado do campo para o nome ja cadastrado
       $candidato->save();
       echo "Candidato atualizado com sucesso!";
    });

Route::get('/excluir-candidato/{id_do_candidato}',function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->delete();
    echo "Candidato excluido com sucesso";
});