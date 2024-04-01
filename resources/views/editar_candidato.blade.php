<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD LARAVEL</title>
</head>
<body>
    <form action="/atualizar-candidato/{{$candidato -> id }}" method="POST">
  @csrf
  @method("PUT")
    <label for="">Nome</label>
    <input type="" placeholder="digite o seu nome" name="nome_candidato" value="{{ $candidato -> nome }}">
    <label for="">telefone</label>
    <input type="text" placeholder="digite o telefone" name="telefone_candidato" value="{{ $candidato -> telefone }}">
    <button>enviar cadastro</button>
    </form>
</body>
</html>