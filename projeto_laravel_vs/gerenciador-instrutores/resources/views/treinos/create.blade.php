<x-layout titulo="Adicionar novo Treino">
    <form action="{{ route('treinos.store') }}" method="post">
        @csrf
        @isset($exercicio1)
        @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="exercicio1" class="form-label">Exercício #1:</label>
            <input type="text" id="exercicio1" name="exercicio1" class="form-control" @isset($exercicio1)value="{{ $exercicio1 }}"@endisset>
        </div>
        <div class="mb-3">
            <label for="exercicio2" class="form-label">Exercício #2:</label>
            <input type="text" id="exercicio2" name="exercicio2" class="form-control" @isset($exercicio2)value="{{ $exercicio2 }}"@endisset>
        </div>
        <div class="mb-3">
            <label for="exercicio3" class="form-label">Exercício #3:</label>
            <input type="text" id="exercicio3" name="exercicio3" class="form-control" @isset($exercicio3)value="{{ $exercicio3 }}"@endisset>
        </div>
        <div class="mb-3">
            <label for="exercicio4" class="form-label">Exercício #4:</label>
            <input type="text" id="exercicio4" name="exercicio4" class="form-control" @isset($exercicio4)value="{{ $exercicio4 }}"@endisset>
        </div>
        <div class="mb-3">
            <label>Selecionar Aluno</label>
            <select name="aluno_id" class="form-control">
                @foreach($alunos as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="javascript:history.back()" class="btn btn-primary m-2">Voltar</a>
    </form>
</x-layout>