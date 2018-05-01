@extends('layouts.painel')
@section('content')
    <div class="title">
        Vendedores
    </div>
            <div class="card">
                <div class="card-header font-weight-bold">Número de Vendedores</div>
                <div class="card-body">
                    @if (Session::has('mensagem_sucesso_vendedor'))
                        <div class="alert alert-success" id="success-alert">{{ Session::get('mensagem_sucesso_vendedor') }} </div>
                    @endif
                    <form method="POST" action="{{ route('adcVendedor') }}">
                        @csrf

                        <div class="form-group row {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="inputname" class="col-sm-2 col-form-label font-weight-bold">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name='nome' placeholder="Nome" value="{{ old('nome') }}">
                                <span class="text-danger">{{ $errors->first('nome') }}</span>
                            </div>
                        </div>
                        <div class="form-group row  {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="inputEmail" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name='email' placeholder="Email" value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Senha</label>
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
                </div>
    <div class="card">
        <div class="card-header font-weight-bold">Registro de Vendedores</div>
        <div class="card-body">
            <div class="table-responsive " style="table-layout:fixed ;width:100%;  white-space: nowrap;">
                <table class="table table-bordered text-center ">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Apagar</th>

                    <tbody>
                    @foreach($vendedores as $vendedor)
                        <tr>
                            <td id="myTable">{{ $vendedor->id }}</td>
                            <td>{{ $vendedor->name }}</td>
                            <td>{{ $vendedor->email }}</td>
                            <td>
                                <button type="submit" class="btn btn-success btn-sm" onClick="location.href='vendedores/{{ $vendedor->id }}/editar_vendedores'">Editar</button>
                            </td>
                            <td>
                                <!-- GAMB PARA APAGAR -->
                                <form  method="POST" action="vendedores/{{$vendedor->id}}">
                                    <button class="btn btn-danger btn-sm" type="submit"  onClick="return checkDelete()">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        //faz o alert sumir
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        //faz confirm do button delete
        function checkDelete(){
            return confirm('Você tem certeza que quer deletar esse vendedor?');
        }
        </script>
            </div>

@endsection

