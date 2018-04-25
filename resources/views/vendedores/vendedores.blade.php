@extends('layouts.painel')
@section('content')

    <div class="title">
        Vendedores
    </div>
    <div class="main">
        <div class="widget">
            <div class="title">Número de Vendedores</div>
            <div class="chart">

            <div class="container">
  <form method="POST" action="">
      @csrf

      <div class="form-group row">
      <label for="inputname" class="col-sm-2 col-form-label">nome</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" placeholder="nome">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">adcionar</button>
      </div>
    </div>
  </form>
</div>
            </div>
        </div>

    </div>
@endsection

