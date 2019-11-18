@extends('layouts.default')

@section('content')
    <div class="container">
        <form name="cartorio" class="form-horizontal mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cadastrar cartório</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
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
                                    <input type="text" name="documento" id="documento" class="form-control"
                                           value="" disabled>
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
                                        @foreach($ufs as $uf)
                                            <option value="{{ $uf['name'] }}">{{ $uf['description'] }}</option>
                                        @endforeach
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
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col">
                        <div class="form-group float-right">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-success">Salvar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop