@extends('layouts.main')

@section('title','Comics')

@section('content')
{{-- cards section --}}
<section id="contents">
    <section class="series-contents my-container">
        <div class="title">current series</div>
        @if (session('delete'))
            <div class="pt-5">
                <div class="alert alert-danger" role="alert">
                    Eliminato con successo il fumetto {{ session('delete') }}
                </div>
            </div>
        @endif
        <div class="series">
            @foreach ($comics as $comic)
            <div class="card-comics">
                <div class="d-flex justify-content-center my-3">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success me-2">Modifica</a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="delete-form">
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
            <a class="button-load pointer" href="{{ route('comics.trash') }}">Cestino</a>
        </div>
    </section>
</section>

{{-- content blue section --}}
@include('includes.content_blue') 
    
@endsection

@section('scripts')
    <script src="{{ asset('js/confirm_delete_index.js') }}"></script>
@endsection