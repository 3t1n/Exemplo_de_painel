@extends('layouts.painel')
@section('content')
    <div class="title">
        Vendedores
    </div>
            <div class="card">
                <div class="card-header font-weight-bold">Número de Vendedores</div>
                <div class="card-body">
                    @if (Session::has('mensagem_sucesso_vendedor'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso_vendedor') }} </div>
                    @endif
                    <form method="POST" action="{{ route('adcVendedor') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label font-weight-bold">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name='name' placeholder="nome">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name='email' placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Senha</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Adcionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    <div class="card">
        <div class="card-header font-weight-bold">Registro de Vendedores</div>
        <div class="card-body">
            <div class="table-responsive " style="table-layout:fixed ;width:100%;  white-space: nowrap;">
                <table class="table table-bordered text-center ">

                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <tbody>
                    @foreach($vendedores as $vendedor)
                        <tr>
                            <td>{{ $vendedor->id }}</td>
                            <td>{{ $vendedor->name }}</td>
                            <td>{{ $vendedor->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>

    </div>
    </div>


@endsection

