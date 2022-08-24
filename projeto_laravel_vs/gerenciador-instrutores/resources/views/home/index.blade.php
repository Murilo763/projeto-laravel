<x-layout titulo="Gerenciador de Instrutores e Alunos">
    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item">
        <a href="{{route('instrutores.create')}}" class="btn btn-primary mb-2">Adicionar novo Instrutor</a>
</li>
<li class="list-group-item">
        <a href="{{route('alunos.create')}}" class="btn btn-primary mb-2">Adicionar Aluno</a>
</li>
<li class="list-group-item">
        <a href="{{route('treinos.create')}}" class="btn btn-primary mb-2">Adicionar Treino para um Aluno</a>
</li>
        </ul>
    </div>
    
</x-layout>
