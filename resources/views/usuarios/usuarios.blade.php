@extends('layouts.painel')
@section('content')
    <div class="title">
        Usuários
    </div>
    <div class="card">
        <div class="card-header font-weight-bold">Administradores</div>
        <div class="card-body">
            @if (Session::has('mensagem_sucesso_usuario'))
                <div class="alert alert-success" id="success-alert">{{ Session::get('mensagem_sucesso_usuario') }} </div>
            @endif
            <form method="POST" action="{{ route('adcUsuario') }}">
                @csrf
                <div class="form-group row {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome" class="col-sm-2 col-form-label font-weight-bold">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name='nome' placeholder="Nome" value="{{ old('nome') }}">
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    </div>
                </div>
                <div class="form-group row  {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name='email' placeholder="Email"  value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 col-form-label font-weight-bold">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name='password' placeholder="Senha">
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Adcionar</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header font-weight-bold">Registro de Administradores</div>
                <div class="card-body">
                    <div class="table-responsive " style="table-layout:fixed ;width:100%;  white-space: nowrap;">
                        <table class="table table-bordered text-center "  id="makeEditable">
                            <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($usuario as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td name="buttons">
                                        <div class="btn-group ">
                                            <button type="button" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></button>
                                        <!-- GAMB PARA APAGAR -->
                                        <form  method="POST" action="usuarios/{{$user->id}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-outline-danger" type="submit"   onClick="return checkDelete()"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
                <!-- JAVASCRIPT -->


                <script type="text/javascript">
                    //faz o alert sumir
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
                    //faz confirm do button delete
                    function checkDelete(){
                        return confirm('Você tem certeza que quer deletar esse administrador?');
                    }
                </script>
            </div>
        </div>
    </div>


@endsection

