@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar cliente</div>
                    <div class="card-body">
                        <form action="/cliente" method="post" id="formulario">
                        @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control{{$errors->has('nome') ? ' border-danger' : '' }}" id="nome" name="nome" value="{{old('nome')}}"onchange="validarCep()">
                                <small class="form-text text-danger">{!! $errors->first('nome') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="cpf">Cpf</label>
                                <input type="text" class="form-control{{$errors->has('cpf') ? ' border-danger' : '' }}" id="cpf" name="cpf" value="{{old('cpf')}}"onchange="validarCep()">
                                <small class="form-text text-danger">{!! $errors->first('cpf') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Rg">Rg</label>
                                <input type="text" class="form-control{{$errors->has('rg') ? ' border-danger' : '' }}" id="rg" name="rg" value="{{old('rg')}}"onchange="validarCep()">
                                <small class="form-text text-danger">{!! $errors->first('rg') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Nasc">Nasc</label>
                                <input type="date" class="form-control{{$errors->has('nasc') ? ' border-danger' : '' }}" id="nasc" name="nasc" value="{{old('nasc')}}"onchange="validarCep()">
                                <small class="form-text text-danger">{!! $errors->first('nasc') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Cep">Cep</label>
                                <input type="text" class="form-control{{$errors->has('cep') ? ' border-danger' : '' }}" id="cep" name="cep" value="{{old('cep')}}" onchange="validarCep()">
                                <small class="form-text text-danger">{!! $errors->first('cep') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Rua">Rua</label>
                                <input type="text" class="form-control{{$errors->has('rua') ? ' border-danger' : '' }}" id="rua" name="rua" value="{{old('rua')}}" readonly=“true”>
                                <small class="form-text text-danger">{!! $errors->first('rua') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Bairro">Bairro</label>
                                <input type="text" class="form-control{{$errors->has('bairro') ? ' border-danger' : '' }}" id="bairro" name="bairro" value="{{old('bairro')}}"readonly=“true”>
                                <small class="form-text text-danger">{!! $errors->first('bairro') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Cidade">Cidade</label>
                                <input type="text" class="form-control{{$errors->has('cidade') ? ' border-danger' : '' }}" id="cidade" name="cidade" value="{{old('cidade')}}"readonly=“true”>
                                <small class="form-text text-danger">{!! $errors->first('cidade') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Estado">Estado</label>
                                <input type="text" class="form-control{{$errors->has('estado') ? ' border-danger' : '' }}" id="estado" name="estado" value="{{old('estado')}}"readonly=“true”>
                                <small class="form-text text-danger">{!! $errors->first('estado') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="Numero">Numero</label>
                                <input type="text" class="form-control{{$errors->has('numero') ? ' border-danger' : '' }}" id="numero" name="numero" value="{{old('numero')}}">
                                <small class="form-text text-danger">{!! $errors->first('numero') !!}</small>
                            </div>
                            <input id="send" class="btn btn-primary mt-4" type="submit" value="Salvar Cliente" onclick="UserActionPost()">
                        </form>
                        <a class="btn btn-primary float-right" href="/cliente"><i class="fas fa-arrow-circle-up"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection
