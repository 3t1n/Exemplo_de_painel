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
            <form>
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
                        <label for="cpfcnpj" class="font-weight-bold">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="cpfcnpj" value="" placeholder="Digite seu CPF OU CNPJ *" maxlength=18>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="font-weight-bold">Telefone</label>
                        <input type="text" class="form-control"  id="telefone" name="telefone" placeholder="Digite o seu Telefone com DDD*" maxlength="18">
                    </div>
                </div>
                <!--  endereco -->
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="cep" class="font-weight-bold">CEP</label>
                        <input type="text" class="form-control" id="cep"  placeholder="CEP" >
                    </div>

                    <div class="form-group col-md-1">
                        <label for="cep" class="font-weight-bold" >Não sabe seu CEP?</label>
                    <button class="btn btn-success form-control" onclick="window.open('http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm')">CEP</button>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="bairro" class="font-weight-bold">Bairro</label>
                        <input type="text" class="form-control"  id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade" class="font-weight-bold">Cidade</label>
                        <input type="text" class="form-control"  id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf" class="font-weight-bold">Estado - UF</label>
                        <select id="uf" class="form-control">
                            <option selected>Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>


                <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="Logradouro" class="font-weight-bold">Logradouro</label>
                    <input type="text" class="form-control"  id="rua" name="Logradouro" placeholder="Rua, Avenida, etc.." >
                </div>
                <div class="form-group col-md-1">
                    <label for="numero" class="font-weight-bold">Número</label>
                    <input type="number" class="form-control" id="numero"  placeholder="Número">
                </div>
                    <div class="form-group col-md-6">
                        <label for="complemento" class="font-weight-bold">*Complemento (Opcional)</label>
                        <input type="text" class="form-control" id="complemento"  placeholder="*Opcional">
                    </div>
                </div>
            </form>
                <!--  Depois passar para um arq js -->
                <!-- faz o mask dos inputs e pega cep via api -->
                <script type="text/javascript">

                    $("input[id*='cpfcnpj']").inputmask({
                        mask: ['999.999.999-99', '99.999.999/9999-99'],
                        keepStatic: true
                    });
                    $("input[id*='telefone']").inputmask({
                        mask: ['(99) 9999-9999', '(99) 99999-9999'],
                        keepStatic: true
                    });

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

