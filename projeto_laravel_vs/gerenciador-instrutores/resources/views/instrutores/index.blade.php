<x-layout titulo="Lista de Instrutores">

<ul class="list-group">
<li class="list-group-item">
<a href="{{route('instrutores.create')}}" class="btn btn-primary mt-5 mb-5 m-2">Adicionar novo Instrutor</a>
</li>
<li class="list-group-item">
<a href="{{route('alunos.create')}}" class="btn btn-primary mt-5 mb-5 m-2">Adicionar Aluno</a>
</li>
<li class="list-group-item">
<a href="{{route('treinos.create')}}" class="btn btn-primary mt-5 mb-5 m-2">Adicionar Treino para um Aluno</a>
</li>
<li class="list-group-item">
<a href="{{ route('instrutor.retorno') }}" class="btn btn-primary mt-5 mb-5 m-2">Ver Instrutores em JSON</a>
</li>
<li class="list-group-item">
<a href="{{ route('aluno.retorno2') }}" class="btn btn-primary mt-5 mb-5 m-2">Ver Alunos em JSON</a>
</li>
<li class="list-group-item">
<a href="{{ route('treino.retorno3') }}" class="btn btn-primary mt-5 mb-5 m-2">Ver Treinos em JSON</a>
</li>
</ul>


@isset($mensagemSucesso)
<div class="alert alert-success">
  {{ $mensagemSucesso }}
</div>
@endisset

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome do Instrutor</th>
      <th scope="col">Idade</th>
      <th scope="col">Turno de Atendimento</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      @foreach($instrutores as $instrutor)
    <tr>
        
      <th scope="row">{{$instrutor->id}}</th>
      <td>
        <a href="{{ route('alunos.index', $instrutor->id) }}">
          {{$instrutor->nome}}
        </a>
      </td>
      <td>{{$instrutor->idade}}</td>
      <td>{{$instrutor->turno}}</td>
      <td class="d-flex">
        <a href="{{ route('instrutores.edit', $instrutor->id) }}" class="btn btn-primary btn-sm">
          Editar
        </a>
        <form action="{{ route('instrutores.destroy', $instrutor->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">
            Excluir
          </button>
        </form>
        
      </td>
    </tr>
    @endforeach
    </tbody>
</table>
</x-layout>