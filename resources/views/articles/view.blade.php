@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>{{ $article->title }}</h2>
        <h4>{{ $article->subtitle }}</h4>

        <div>{!! html_entity_decode($article->content) !!}</div>

        <hr>

        <div>
            <span class="text-center">
                    <img src="http://lorempixel.com/16/16/people" class="img-circle">
                </span>
            <span>{{ $article->user->name }}</span>
            <span> &bull; </span>
            <small>{{ date('F d, Y', strtotime($article->created_at)) }}</small>
        </div>
    </div>

@endsection