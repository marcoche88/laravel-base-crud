@extends('layouts.main')

@section('title', $comic->title)

@section('content')
<section id="comic">

    {{-- section blue with img --}}
    <div class="cover">
        <figure class="my-container">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        </figure>
    </div>

    {{-- section details comic with adv --}}
    <div class="row my-container">
        <div class="col description">
            <h1>{{ $comic->title }}</h1>
            <div class="price">
                <div class="price-left">
                    <div class="price-number">U.S. Price: <span>{{ $comic->price }}</span></div>
                    <div class="available">AVAILABLE FROM {{ $comic->sale_date }}</div>
                </div>
                <div class="price-right">Check Availability &#9660;</div>
            </div>
            <div class="text">
                {{ $comic->description }}
            </div>
            <div>
                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success my-3">Modifica</a>
                <a href="{{ route('comics.index') }}" class="btn btn-warning">Indietro</a>
            </div>
        </div>
        <div class="col adv">
            <img src="{{ asset('images/adv.jpg') }}" alt="adv">
        </div>
    </div>
</section>
    
@endsection