@extends('layouts.painel')
@section('content')

    <div class="title">
        Fornecedores
    </div>
    <div class="card">
            <div class="card-header font-weight-bold">Adicionar Fornecedor</div>
        <div class="card-body">

            @if (Session::has('mensagem_sucesso_fornecedor'))
                <div class="alert alert-success" id="success-alert">{{ Session::get('mensagem_sucesso_fornecedor') }} </div>
            @endif
            <form method="POST" action="{{ route('adcFornecedor') }}">
                @csrf
                <div class="form-row">
                    <!--  nome e email -->
                    <div class="form-group col-md-6 {{ $errors->has('nome') ? 'has-error' : '' }}">
                        <label for="inputName" class="font-weight-bold">Nome</label>
                        <input type="text" class="form-control" id="inputName" name="nome" placeholder="Nome"  value="{{ old('nome') }}" >
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('cpf_cnpj') ? 'has-error' : '' }}">
                        <label for="cpfcnpj" class="font-weight-bold">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="cpfcnpj" name="cpf_cnpj" placeholder="Digite seu CPF OU CNPJ *" maxlength=18 value="{{ old('cpf_cnpj') }}">
                        <span class="text-danger">{{ $errors->first('cpf_cnpj') }}</span>
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('telefone') ? 'has-error' : '' }}">
                        <label for="telefone" class="font-weight-bold">Telefone</label>
                        <input type="text" class="form-control"  id="telefone" name="telefone" placeholder="Digite o seu Telefone com DDD*" maxlength="18" value="{{ old('telefone') }}">
                        <span class="text-danger">{{ $errors->first('telefone') }}</span>
                    </div>
                </div>
                <!--  endereco -->
                <div class="form-row">
                    <div class="form-group col-md-1 {{ $errors->has('cep') ? 'has-error' : '' }}">
                        <label for="cep" class="font-weight-bold">CEP</label>
                        <input type="text" class="form-control" id="cep"  name="cep" placeholder="CEP"  value="{{ old('cep') }}">
                        <span class="text-danger">{{ $errors->first('cep') }}</span>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="cep" class="font-weight-bold">CEP?</label>
                    <button type="button" class="btn btn-primary form-control" onclick="window.open('http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm')">CEP</button>
                    </div>

                    <div class="form-group col-md-4 {{ $errors->has('bairro') ? 'has-error' : '' }}">
                        <label for="bairro" class="font-weight-bold">Bairro</label>
                        <input type="text" class="form-control"  id="bairro" name="bairro" placeholder="Bairro"  value="{{ old('bairro') }}">
                        <span class="text-danger">{{ $errors->first('bairro') }}</span>
                    </div>
                    <div class="form-group col-md-4 {{ $errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="cidade" class="font-weight-bold">Cidade</label>
                        <input type="text" class="form-control"  id="cidade" name="cidade" placeholder="Cidade"  value="{{ old('cidade') }}">
                        <span class="text-danger">{{ $errors->first('cidade') }}</span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf" class="font-weight-bold">Estado - UF</label>
                        <select id="uf"  name="uf" class="form-control">
                            <option selected>Estado</option>
                            <option value="AC" @if(old('uf') == 'AC')selected @endif>Acre</option>
                            <option value="AL" @if(old('uf') == 'AL')selected @endif>Alagoas</option>
                            <option value="AP" @if(old('uf') == 'AP')selected @endif>Amapá</option>
                            <option value="AM" @if(old('uf') == 'AM')selected @endif>Amazonas</option>
                            <option value="BA" @if(old('uf') == 'BA')selected @endif>Bahia</option>
                            <option value="CE" @if(old('uf') == 'CE')selected @endif>Ceará</option>
                            <option value="DF" @if(old('uf') == 'DF')selected @endif>Distrito Federal</option>
                            <option value="ES" @if(old('uf') == 'ES')selected @endif>Espírito Santo</option>
                            <option value="GO" @if(old('uf') == 'GO')selected @endif>Goiás</option>
                            <option value="MA" @if(old('uf') == 'MA')selected @endif>Maranhão</option>
                            <option value="MT" @if(old('uf') == 'MT')selected @endif>Mato Grosso</option>
                            <option value="MS" @if(old('uf') == 'MS')selected @endif>Mato Grosso do Sul</option>
                            <option value="MG" @if(old('uf') == 'MG')selected @endif>Minas Gerais</option>
                            <option value="PA" @if(old('uf') == 'PA')selected @endif>Pará</option>
                            <option value="PB" @if(old('uf') == 'PB')selected @endif>Paraíba</option>
                            <option value="PR" @if(old('uf') == 'PR')selected @endif>Paraná</option>
                            <option value="PE" @if(old('uf') == 'PE')selected @endif>Pernambuco</option>
                            <option value="PI" @if(old('uf') == 'PI')selected @endif>Piauí</option>
                            <option value="RJ" @if(old('uf') == 'RJ')selected @endif>Rio de Janeiro</option>
                            <option value="RN" @if(old('uf') == 'RN')selected @endif>Rio Grande do Norte</option>
                            <option value="RS" @if(old('uf') == 'RS')selected @endif>Rio Grande do Sul</option>
                            <option value="RR" @if(old('uf') == 'RR')selected @endif>Roraima</option>
                            <option value="SC" @if(old('uf') == 'SC')selected @endif>Santa Catarina</option>
                            <option value="SP" @if(old('uf') == 'SP')selected @endif>São Paulo</option>
                            <option value="SE" @if(old('uf') == 'SE')selected @endif>Sergipe</option>
                            <option value="TO" @if(old('uf') == 'TO')selected @endif>Tocantins</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('uf') }}</span>
                    </div>
                </div>


                <div class="form-row">
                <div class="form-group col-md-5 {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                    <label for="Logradouro" class="font-weight-bold">Logradouro</label>
                    <input type="text" class="form-control"  id="rua" name="logradouro" placeholder="Rua, Avenida, etc.."   value="{{ old('logradouro') }}">
                    <span class="text-danger">{{ $errors->first('logradouro') }}</span>
                </div>
                <div class="form-group col-md-1 {{ $errors->has('numero') ? 'has-error' : '' }}">
                    <label for="numero" class="font-weight-bold">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero"  placeholder="Número"  value="{{ old('numero') }}">
                    <span class="text-danger">{{ $errors->first('numero') }}</span>
                </div>
                    <div class="form-group col-md-4 ">
                        <label for="complemento" class="font-weight-bold">Complemento (Opcional)</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="*Opcional">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="adcionar" class="font-weight-bold" >Adcionar</label>
                        <button class="btn btn-success form-control">Adcionar</button>
                    </div>
                </div>

            </form>

                <div class="card">
                    <div class="card-header font-weight-bold">Registro de Administradores</div>
                    <div class="card-body">
                        <div class="table-responsive " style="table-layout:fixed ;width:100%;  white-space: nowrap;">
                            <table class="table table-bordered text-center ">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF/CNPJ</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Logradouro</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                                <tbody>
                                @foreach($fornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->id }}</td>
                                        <td>{{ $fornecedor->nome }}</td>
                                        <td>{{ $fornecedor->email }}</td>
                                        <td>{{ $fornecedor->cpf_cnpj }}</td>
                                        <td>{{ $fornecedor->telefone }}</td>
                                        <td>{{ $fornecedor->cep }}</td>
                                        <td>{{ $fornecedor->bairro }}</td>
                                        <td>{{ $fornecedor->cidade }}</td>
                                        <td>{{ $fornecedor->uf }}</td>
                                        <td>{{ $fornecedor->logradouro }}</td>
                                        <td>{{ $fornecedor->numero }}</td>
                                        <td>{{ $fornecedor->complemento }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-sm" onClick="location.href='fornecedor/{{ $fornecedor->id }}/editar_vendedores'">Editar</button>
                                        </td>
                                        <td>
                                            <!-- GAMB PARA APAGAR -->
                                            <form  method="POST" action="fornecedores/{{$fornecedor->id}}">
                                                @method('DELETE')
                                                @csrf
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
                <!--  Depois passar para um arq js -->
                <!-- faz o mask dos inputs e pega cep via api -->
                <script type="text/javascript">
                    //faz o alert sumir
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
                    //faz confirm do button delete
                    function checkDelete(){
                        return confirm('Você tem certeza que quer deletar esse fornecedor?');
                    }
                    //faz mask nos inputs
                    $("input[id*='cpfcnpj']").inputmask({
                        mask: ['999.999.999-99', '99.999.999/9999-99'],
                        keepStatic: true
                    });
                    $("input[id*='telefone']").inputmask({
                        mask: ['(99) 9999-9999', '(99) 99999-9999'],
                        keepStatic: true
                    });
                    $("input[id*='cep']").inputmask({
                        mask: ['99999-999'],
                        keepStatic: true
                    });
                    //consome a api do cep e autocompleta os input

                    $(document).ready(function() {

                        function limpa_formulário_cep() {
                            // Limpa valores do formulário de cep.
                            $("#rua").val("");
                            $("#bairro").val("");
                            $("#cidade").val("");
                            $("#uf").val("");
                        }
                        //Quando o campo cep perde o foco.
                        $("#cep").blur(function() {
                            //Nova variável "cep" somente com dígitos.
                            var cep = $(this).val().replace(/\D/g, '');
                            //Verifica se campo cep possui valor informado.
                            if (cep != "") {
                                //Expressão regular para validar o CEP.
                                var validacep = /^[0-9]{8}$/;
                                //Valida o formato do CEP.
                                if(validacep.test(cep)) {
                                    //Preenche os campos com "..." enquanto consulta webservice.
                                    $("#rua").val("...");
                                    $("#bairro").val("...");
                                    $("#cidade").val("...");
                                    $("#uf").val("...");
                                    //Consulta o webservice viacep.com.br/
                                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                                        if (!("erro" in dados)) {
                                            //Atualiza os campos com os valores da consulta.
                                            $("#rua").val(dados.logradouro);
                                            $("#bairro").val(dados.bairro);
                                            $("#cidade").val(dados.localidade);
                                            $("#uf").val(dados.uf);
                                        } //end if.
                                        else {
                                            //CEP pesquisado não foi encontrado.
                                            limpa_formulário_cep();
                                            alert("CEP não encontrado.");
                                        }
                                    });
                                } //end if.
                                else {
                                    //cep é inválido.
                                    limpa_formulário_cep();
                                    alert("Formato de CEP inválido.");
                                }
                            } //end if.
                            else {
                                //cep sem valor, limpa formulário.
                                limpa_formulário_cep();
                            }
                        });
                    });
                </script>
        </div>
    </div>
@endsection

