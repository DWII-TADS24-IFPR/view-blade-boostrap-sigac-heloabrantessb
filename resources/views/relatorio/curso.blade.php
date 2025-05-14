<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (isset($dados))
        <h1>{{$dados['curso']}}</h1>

        @foreach($dados['alunos'] as $aluno)
            <p>{{ $aluno }}</p>
        @endforeach

        <p>{{$dados['duração']}}</p>
    @endif
</body>
</html>