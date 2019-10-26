@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/arquivo/importar" enctype=multipart/form-data class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <label class="file-upload btn btn-primary">
                            <i class="fas fa-upload"></i> Upload XML<input type="file" />
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
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->razao }}</td>
                    <td>{{ $user->documento }}</td>
                    <td>{{ $user->telefone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="#" class="btn btn-primary" data-iduser="{{ $user->id }}"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" data-iduser="{{ $user->id }}"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"></td>
                </tr>
            @endforelse
        </table>
        </tbody>
    </div>
@stop
