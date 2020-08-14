@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Cliente') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="/cliente/{{$cliente->id}}" title="Show Details">{{$cliente->nome}}</a> 
                                   <a class="btn btn-sm btn-light ml-2" href="/cliente/{{$cliente->id}}/edit">Editar Cliente</a> 
                                   <form class="float-right" style="display: inline" action="/cliente/{{$cliente->id}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Deletar" onclick="UserActionDelete({{$cliente->id}})">
                                   </form>
                                </li>
                        </ul>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/cliente/create">Adicionar Cliente</a>
            </div>
        </div>
    </div>
</div>
@endsection