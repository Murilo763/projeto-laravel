<x-layout titulo="Adicionar novo Aluno">
    <form action="{{ route('alunos.store') }}" method="post">
        @csrf
        @isset($nome)
        @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" @isset($nome)value="{{ $nome }}"@endisset>
        </div>
        <div class="mb-3">
            <label>Selecionar Instrutor</label>
            <select name="instrutor_id" class="form-control">
                @foreach($instrutores as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="javascript:history.back()" class="btn btn-primary m-2">Voltar</a>
    </form>
</x-layout>