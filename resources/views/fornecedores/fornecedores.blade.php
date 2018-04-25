@extends('layouts.painel')
@section('content')

    <div class="title">
        Fornecedores
    </div>
    <div class="card">
            <div class="card-header">Adicionar Fornecedor</div>
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
                        <label for="inputEmail">Email:</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

