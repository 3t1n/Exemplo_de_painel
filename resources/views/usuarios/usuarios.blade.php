@extends('layouts.painel')
@section('content')
    <div class="title">
        Usuários
    </div>
    <div class="card">
        <div class="card-header font-weight-bold">Administradores</div>
        <div class="card-body">
            @if (Session::has('mensagem_sucesso_usuario'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso_usuario') }} </div>
            @endif
            <form method="POST" action="{{ route('adcUsuario') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label font-weight-bold">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name='name' placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailinput" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="emailinput" name='emailinput' placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senhainput" class="col-sm-2 col-form-label font-weight-bold">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senhainput" name='senhainput' placeholder="Senha">
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
        <div class="card-header font-weight-bold">Registro de Administradores</div>
        <div class="card-body">
            <div class="table-responsive " style="table-layout:fixed ;width:100%;  white-space: nowrap;">
                <table class="table table-bordered text-center ">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <tbody>
                    @foreach($usuario as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

