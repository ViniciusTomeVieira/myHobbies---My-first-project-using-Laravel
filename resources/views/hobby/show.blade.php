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
                        @if($hobby->tags->count() > 0)
                            <b>Used tags: </b>(Click to remove)
                            <p>@foreach($hobby->tags as $tag)
                                    <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach"><span class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                            @endforeach</p>
                        @endif
                        @if($availableTags->count() > 0)
                            <b>Available tags: </b>(Click to assign)
                            <p>@foreach($availableTags as $tag)
                                    <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach"><span class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                            @endforeach</p>
                        @endif
                    </div>
            </div>
            <div class="mt-2">
                <a class='btn btn-success btn-sm' href="{{URL::previous()}}">Back to overview</a>
            </div>
        </div>
    </div>
</div>
@endsection