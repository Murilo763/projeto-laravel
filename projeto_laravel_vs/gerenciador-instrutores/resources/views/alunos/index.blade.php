<x-layout titulo="Lista de Alunos do Instrutor {!! $instrutores->nome !!}">



@isset($mensagemSucesso)
<div class="alert alert-success">
  {{ $mensagemSucesso }}
</div>
@endisset

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome do Aluno</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      @foreach($alunos as $aluno)
    <tr>
      <th scope="row">{{$aluno->id}}</th>
      <td>
          <a href="{{ route('treinos.index', $aluno->id) }}">
            {{$aluno->nome}}
          </a>
      </td>
      <td class="d-flex">
        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">
            Excluir Aluno
          </button>
        </form>
      </td>
    </tr>
    @endforeach
    </tbody>
</table>
<a href="{{route('instrutores.index')}}" class="btn btn-primary">Voltar</a>
</x-layout>