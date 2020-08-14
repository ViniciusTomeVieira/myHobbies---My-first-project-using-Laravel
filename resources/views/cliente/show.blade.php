@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Detalhes Cliente') }}</div>
                    <div class="card-body">
                        <b>{{$cliente->nome}}</b>
                        <p>{{$cliente->cpf}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/cliente">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection