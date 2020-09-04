@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $user->name}}</div>
                    <div class="card-body">
                        <b>My motto: <br> {{$user->motto}}</b>
                        <p class="mt-2"><b>About me:</b> <br> {{$user->about_me}}</p>
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="{{URL::previous()}}">Back to overview</a>
            </div>
        </div>
    </div>
</div>
@endsection