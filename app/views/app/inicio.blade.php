@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <form name="importar-registros" method="post" action="/arquivo/importar"
                      class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                            <label class="file-upload btn btn-primary mt-2">
                                Upload XML <input type="file" name="arquivo" id="arquivo"/>
                            </label>
                            <input type="submit" class="btn btn-success" vlaue="enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="preload"></div>
        <table class="table table-responsive-lg table-hover mt-10 table-sm">
            <thead class="table-dark">
            <tr>
                {{--<th width="20%">Nome</th>--}}
                <th width="25%">Razão</th>
                <th width="15%">Documeto</th>
                <th width="10%">telefone</th>
                <th width="15%">E-mail</th>
                <th width="25%">Endereco</th>
                <th width="10%">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cartorios as $cartorio)
                <tr>
                    {{--<td>{{ $cartorio->nome }}</td>--}}
                    <td>{{ $cartorio->razao }}</td>
                    <td><span class="cpf_cnpj">{{ $cartorio->documento }}</span></td>
                    <td><span class="phone">{{ $cartorio->telefone }}</span></td>
                    <td>{{ $cartorio->email }}</td>
                    <td>
                        {{ $cartorio->endereco()->nome }}, {{ $cartorio->endereco()->bairro }},
                        {{ $cartorio->endereco()->cidade }} - {{ $cartorio->endereco()->uf }}
                        , <span class="cep">{{ $cartorio->endereco()->cep }}</span>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-primary" data-idcartorio="{{ $cartorio->id }}"
                           data-nome="{{ $cartorio->nome }}"
                           data-target="#update-cartorio" data-toggle="modal"><i
                                    class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-danger delete-cartorio" data-idcartorio="{{ $cartorio->id }}"><i
                                    class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7"></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <span class="paginate-info">
                    Exibindo de <b>{{ $paginator->getCurrentPageFirstItem() }}</b> até
                    <b>{{ $paginator->getCurrentPageLastItem() }}</b> de
                    <b>{{ $paginator->getTotalItems() }}</b> registros.
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                {!! $paginator !!}
            </div>
        </div>
    </div>
    <div id="update-cartorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-cartorio"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success save">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@stop
