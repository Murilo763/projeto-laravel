<x-layout titulo="Registrar Novo Usuario">

@isset($mensagemErro)
<div class="alert alert-danger">
  {{ $mensagemErro }}
</div>
@endisset

<form method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>

    <div class="d-flex">
    <button type="submit" class="btn btn-primary mt-3 m-2">
        Entrar
    </button>
    <a href="javascript:history.back()" class="btn btn-primary mt-3 m-2">Voltar</a>
    </div>

</form>
</x-layout>