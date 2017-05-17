@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('home')}}">HOME</a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$post->title}}
                </div>

                <div class="panel-body">
                    {{$post->description}}
                </div>
                <div class="panel-footer">
                   <strong>Autor:</strong> {{$post->author->name}}
                </div>

            </div>

    </div>
@endsection
