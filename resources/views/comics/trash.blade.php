@extends('layouts.main')

@section('title','Trash')

@section('content')
{{-- cards section --}}
<section id="contents">
    <section class="series-contents my-container">
        <div class="title">Comics Trash</div>
        <div class="series">
            @foreach ($comics as $comic)
            <div class="card-comics">
                <div class="d-flex justify-content-center my-3">
                    {{-- bottone ripristina --}}
                </div>
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" />
                <figcaption>{{ $comic->title }}</figcaption>
            </div>
            @endforeach
        </div>
        <div class="load-more">
            <a class="button-load pointer" href="{{ url()->previous() }}">Indietro</a>
        </div>
    </section>
</section>

@endsection