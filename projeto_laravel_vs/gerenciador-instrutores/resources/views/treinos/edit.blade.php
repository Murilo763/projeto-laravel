<x-layout titulo="Editar dados do Treino">
<form action="{{ url('/treinos/'.$treino->id) }}" method="post" >
        @csrf
     
        @method('PUT')
     
        <div class="mb-3">
            <label for="exercicio1" class="form-label">Exercício #1:</label>
            <input type="text" id="exercicio1" name="exercicio1" class="form-control" value="{{ $treino->exercicio1 }}">
        </div>
        <div class="mb-3">
            <label for="exercicio2" class="form-label">Exercício #2:</label>
            <input type="text" id="exercicio2" name="exercicio2" class="form-control" value="{{ $treino->exercicio2 }}">
        </div>
        <div class="mb-3">
            <label for="exercicio3" class="form-label">Exercício #3:</label>
            <input type="text" id="exercicio3" name="exercicio3" class="form-control" value="{{ $treino->exercicio3 }}">
        </div>
        <div class="mb-3">
            <label for="exercicio4" class="form-label">Exercício #4:</label>
            <input type="text" id="exercicio4" name="exercicio4" class="form-control"value="{{ $treino->exercicio4 }}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>


