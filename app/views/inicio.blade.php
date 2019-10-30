@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/arquivo/importar" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <label class="file-upload btn btn-primary">
                            <i class="fas fa-upload"></i> Upload XML<input type="file" name="arquivo"/>
                        </label>
                        <input type="submit" class="btn btn-success" vlaue="enviar">
                    </div>
                </div>
            </form>
        </div>
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
                        @php
                            $endereco = $cartorio->enderecos()[0];
                        @endphp

                        {{ $endereco->nome }}, {{ $endereco->bairro }}, {{ $endereco->cidade }} - {{ $endereco->uf }}
                        , {{ $endereco->cep }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" data-iduser="{{ $cartorio->id }}"><i
                                    class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" data-iduser="{{ $cartorio->id }}"><i
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
    </div>
@stop
