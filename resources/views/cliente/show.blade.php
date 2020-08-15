@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Detalhes Cliente') }}</div>
                    <div class="card-body">
                        <b>Nome: {{$cliente->nome}}</b>
                        <p>Cpf: {{$cliente->cpf}}</p>
                        <p>Rg: {{$cliente->rg}}</p>
                        <p>Nasc: {{$cliente->nasc}}</p>
                        <p>Cep: {{$cliente->cep}}</p>
                        <p>Rua: {{$cliente->rua}}</p>
                        <p>Bairro: {{$cliente->bairro}}</p>
                        <p>Cidade: {{$cliente->cidade}}</p>
                        <p>Estado: {{$cliente->estado}}</p>
                        <p>Numero: {{$cliente->numero}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/cliente">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection