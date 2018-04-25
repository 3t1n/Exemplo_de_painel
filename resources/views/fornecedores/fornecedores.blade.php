@extends('layouts.painel')
@section('content')

    <div class="title">
        Fornecedores
    </div>
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
                        <input type="text" class="form-control" id="inputRegistro" value="" placeholder="Digite seu CPF OU CNPJ *" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="font-weight-bold">Telefone</label>
                        <input type="text" class="form-control" data-mask="(00) 00000-0000" id="telefone" name="telefone" placeholder="Digite o seu Telefone com DDD*" maxlength="12">
                    </div>
                </div>
                <div class="conjunto">
                    <input id="data" type="text" placeholder="DATA"/>
                    <input id="telefone" type="text" placeholder="TELEFONE"/>

                    <!-- Seu input -->
                    <input class="form-control" type="text" id="cpf" name="cpf" value="cpf" placeholder="Digite o CPF..." maxlength="14">
                </div>
            </form>
                <script type="text/javascript">
                    jQuery.noConflict();
                    jQuery(function($){
                        $("#data").mask("99/99/9999");
                        $("#telefone").mask("(099) 9999-9999");
                    });
                </script>
        </div>
    </div>

@endsection

