@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Todos os clientes') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($clientes as $cliente)
                                <li class="list-group-item">
                                   <a href="/cliente/{{$cliente->id}}" title="Mostrar cliente">{{$cliente->nome}}</a> 
                                   <a class="btn btn-sm btn-light ml-2" href="/cliente/{{$cliente->id}}/edit">Editar Cliente</a> 
                                   <form class="float-right" style="display: inline" action="/cliente/{{$cliente->id}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Deletar" onclick="UserActionDelete({{$cliente->id}})">
                                   </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Pesquisar cliente') }}</div>
                <div class="card-body">
                    <form action="/cliente/{{$cliente->id}}" method="post" id="pesquisa">
                    @csrf 
                    @method('GET')
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control{{$errors->has('id') ? ' border-danger' : '' }}" id="idCliente" name="idCliente" value=""  onclick="UserActionGet()">
                        <small class="form-text text-danger">{!! $errors->first('id') !!}</small>
                    </div>
                    <input id="enviar" class="btn btn-primary mt-4" type="button" value="Pesquisar Cliente" onclick="pesquisarCliente()">
                    <div class="form-group mt-4">
                        <label for="id">Cliente</label>
                        <input type="text" class="form-control{{$errors->has('id') ? ' border-danger' : '' }}" id="result" name="result" value="" readonly=“true”>
                        <small class="form-text text-danger">{!! $errors->first('id') !!}</small>
                    </div>
                </div>
        </div>
        <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/cliente/create">Adicionar Cliente</a>
            </div>
        </div>
    </div>
</div>
@endsection