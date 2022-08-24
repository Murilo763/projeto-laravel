<x-layout titulo="Lista de Exercícos do Treino do Aluno {!! $alunos->nome !!}">

@isset($mensagemSucesso)
<div class="alert alert-success">
  {{ $mensagemSucesso }}
</div>
@endisset

<ul class="list-group">
@foreach($treinos as $treino)
  <li class="list-group-item">{{$treino->exercicio1}}</li>
  <li class="list-group-item">{{$treino->exercicio2}}</li>
  <li class="list-group-item">{{$treino->exercicio3}}</li>
  <li class="list-group-item">{{$treino->exercicio4}}</li>
  @endforeach
</ul>

<span class="d-flex">
@isset($treino->id)
<a href="{{ url('/treinos/'.$treino->id.'/edit') }}" class="btn btn-primary mt-2">
          Editar Treino
</a>
<form action="{{ route('treinos.destroy', $treino->id) }}" method="post">
  @csrf
  @method('DELETE')
  <button class="btn btn-danger mt-2">
    Excluir Treino
  </button>
</form>
@endisset

<a href="javascript:history.back()" class="btn btn-primary mt-2">Voltar</a>
</span>
</x-layout>