@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <form name="importar-registros" method="post" action="/arquivo/importar"
                      enctype=class="form-horizontal">
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
        <table class="table table-responsive-lg table-hover mt-10">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Razão</th>
                <th>Documeto</th>
                <th>telefone</th>
                <th>E-mail</th>
                <th>Endereco</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cartorios as $cartorio)
                <tr>
                    <td>{{ $cartorio->nome }}</td>
                    <td>{{ $cartorio->razao }}</td>
                    <td>{{ $cartorio->documento }}</td>
                    <td>{{ $cartorio->telefone }}</td>
                    <td>{{ $cartorio->email }}</td>
                    <td>
                        {{ $cartorio->endereco()->nome }}, {{ $cartorio->endereco()->bairro }},
                        {{ $cartorio->endereco()->cidade }} - {{ $cartorio->endereco()->uf }}
                        , {{ $cartorio->endereco()->cep }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" data-iduser="{{ $cartorio->id }}"
                           data-target="#update-cartorio" data-toggle="modal"><i
                                    class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger delete-cartorio" data-iduser="{{ $cartorio->id }}"><i
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
            <span>
                {{ $paginator->getCurrentPageFirstItem() }} até {{ $paginator->getCurrentPageLastItem() }} de
                {{ $paginator->getTotalItems() }}
            </span>
        </div>
        <div class="row">
            <div class="col">
                {!! $paginator !!}
            </div>
        </div>
    </div>
@stop
