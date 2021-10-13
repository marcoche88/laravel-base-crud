@extends('layouts.main')

@section('title','Comics')

@section('content')
{{-- cards section --}}
<section id="contents">
    <section class="series-contents my-container">
        <div class="title">current series</div>
        <div class="series">
            @foreach ($comics as $comic)
            <div class="card-comics">
                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success my-3">Modifica</a>
                <a href="{{ route("comics.show", $comic->id) }}"><img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" /></a>
                <figcaption>{{ $comic->title }}</figcaption>
            </div>
            @endforeach
        </div>
        <div class="load-more">
            <div class="button-load pointer">load more</div>
        </div>
    </section>
</section>

{{-- content blue section --}}
@include('includes.content_blue') 
    
@endsection