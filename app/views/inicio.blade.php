@extends('layouts.default')

@section('content')
    <div class="container">
        <table class="table table-responsive-lg table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Razão</th>
                <th>Documeto</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->razao }}</td>
                    <td>{{ $user->documento }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="#" class="btn btn-primary"><i class=""></i> Atualizar</a>
                        <a href="#" class="btn btn-danger"><i class=""></i> Deletar</a>
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
