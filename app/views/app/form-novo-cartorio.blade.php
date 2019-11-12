@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="title">Cadastrar novo cartório</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form name="cartorio">
                    <div class="preload"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="razao">Razão social</label>
                            <input type="text" name="razao" id="razao" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="tabeliao">Tabelião</label>
                            <input type="text" name="tabeliao" id="tabeliao" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_documento">Tipo documento</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control">
                                <option value="">Selecione...</option>
                                <option value="1">CPF</option>
                                <option value="2">CNPJ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" class="form-control cpf-cnpj"
                                   value="">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="phone form-control"
                                   value="">
                        </div>
                        <div class="col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control"
                                   value="">
                        </div>
                        <div class="col-md-6">
                            <label for="uf">UF</label>
                            <select name="uf" id="uf" class="form-control">
                                <option value="">Selecione...</option>
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
                                <option value="EX">Estrangeiro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control"
                                   value="">
                        </div>
                        <div class="col">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" class="form-control"
                                   value="">
                        </div>
                        <div class="col-md-6">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" class="cep form-control"
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success save">Salvar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop