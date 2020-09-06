@extends('layouts.app')

@section('content')
<script>
        $("#send").click(function(event){		
		event.preventDefault();


		$.ajax({
			//METODO DE ENVIO
			type: "POST",
			//URL PARA QUAL OS DADOS SERÃO ENVIADOS
			url: "http://localhost:8080/DatabaseClientesREST/webresources/cliente",
			//DADOS QUE SERÃO ENVIADOS
			data: $("#formulario").serialize(),
			//TIPOS DE DADOS QUE O AJAX TRATA
			dataType: "json",
			//CASO DÊ TUDO CERTO NO ENVIO PARA A API
			success: function(){
				//SUBMETE O FORMULÁRIO PARA A ACTION DEFINIDA NO CABEÇALHO
				//$("#formulario").submit();
                $("#name").val(data)
			}
		});
	})
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Hobby</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/hobby" method="post" id="formulario" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{$errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{old('name')}}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control{{$errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" >
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control{{$errors->has('description') ? ' border-danger' : '' }}" id="description" name="description" rows="5">{{old('description')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                            </div>
                            <input id="send" class="btn btn-primary mt-4" type="submit" value="Save Hobby">
                        </form>
                        <a class="btn btn-primary float-right" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection