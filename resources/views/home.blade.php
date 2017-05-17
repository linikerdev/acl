@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$post->title}}
                </div>

                <div class="panel-body">
                    {{$post->description}}
                </div>
                <div class="panel-footer">
                   <strong>Autor:</strong> {{$post->author->name}}
                    <a href="{{route('update',$post->id)}}">Visualizar</a>
                </div>
            </div>
        @empty
            <p>Sem resultados</p>
        @endforelse
    </div>
@endsection
