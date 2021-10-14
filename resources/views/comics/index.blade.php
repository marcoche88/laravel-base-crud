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
                <div class="d-flex justify-content-center my-3">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success me-2">Modifica</a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
                    </form>
                </div>
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