@extends('layouts.painel')
@section('content')

    <div class="title">
        Fornecedores
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <div class="card">
            <div class="card-header font-weight-bold">Adicionar Fornecedor</div>
        <div class="card-body">

            @if (Session::has('mensagem_sucesso_vendedor'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso_vendedor') }} </div>
            @endif
            <form method="POST" action="{{ route('adcVendedor') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName" class="font-weight-bold">Nome</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail" class="font-weight-bold">Email:</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputRegistro" class="font-weight-bold">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="inputRegistro" value="cpf" placeholder="Digite seu CPF OU CNPJ *" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="font-weight-bold">Telefone</label>
                        <input type="text" class="form-control" data-mask="(00) 00000-0000" id="telefone" name="telefone" placeholder="Digite o seu Telefone com DDD*" maxlength="12">
                    </div>
                </div>
            </form>
            <script>
                $(document).ready(function () {
                    var $seuCampoCpf = $("#inputRegistro");
                    $seuCampoCpf.mask('000.000.000-00', {reverse: true});
                });
            </script>
        </div>
    </div>

@endsection

