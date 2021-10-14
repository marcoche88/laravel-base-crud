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
            <div class="d-flex justify-content-end my-3">
                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success me-3">Modifica</a>
                <a href="{{ route('comics.index') }}" class="btn btn-warning me-3">Indietro</a>
                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancella</button>
                </form>
            </div>
        </div>
        <div class="col adv">
            <img src="{{ asset('images/adv.jpg') }}" alt="adv">
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/confirm_delete_show.js') }}"></script>
@endsection