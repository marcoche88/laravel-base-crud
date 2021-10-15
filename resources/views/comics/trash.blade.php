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
                    <form action="{{ route('comics.restore', $comic->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Ripristina</button>
                    </form>
                </div>
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" />
                <figcaption>{{ $comic->title }}</figcaption>
                <div>Cancellato il {{ $comic->getDeletedAt() }}</div>
            </div>
            @endforeach
        </div>
        <div class="load-more">
            <a class="button-load pointer" href="{{ url()->previous() }}">Indietro</a>
        </div>
    </section>
</section>

@endsection