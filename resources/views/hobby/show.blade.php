@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Hobby Detail') }}</div>
                    <div class="card-body">
                        <b>{{$hobby->name}}</b>
                        <p>{{$hobby->description}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="/hobby/create">Back to overview</a>
            </div>
        </div>
    </div>
</div>
@endsection