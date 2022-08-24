<x-layout titulo="Editar dados do Instrutor">
    <x-instrutores.form action="{{ route('instrutores.update', $instrutor->id) }}" nome="{{ $instrutor->nome }}" idade="{{ $instrutor->idade }}" turno="{{ $instrutor->turno }}"/>
</x-layout>