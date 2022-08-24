<form action="{{ $action }}" method="post">
        @csrf
        @isset($nome)
        @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" @isset($nome)value="{{ $nome }}"@endisset>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Idade:</label>
            <input type="text" id="idade" name="idade" class="form-control" @isset($idade)value="{{ $idade }}"@endisset>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Turno:</label>
            <input type="text" id="turno" name="turno" class="form-control" @isset($turno)value="{{ $turno }}"@endisset>
        </div>
        <div class="d-flex">
        <button type="submit" class="btn btn-primary m-2">Salvar</button>
        <a href="javascript:history.back()" class="btn btn-primary m-2">Voltar</a>
        </div>
    </form>