@extends('layouts.main')

@section('title', $comic['title'])

@section('content')
<section id="comic">

    {{-- section blue with img --}}
    <div class="cover">
        <figure class="container">
            <img src="{{ $comic['thumb'] }}" alt="$comic['title']">
        </figure>
    </div>

    {{-- section details comic with adv --}}
    <div class="row container">
        <div class="col description">
            <h1>{{ $comic['title'] }}</h1>
            <div class="price">
                <div class="price-left">
                    <div class="price-number">U.S. Price: <span>{{ $comic['price'] }}</span></div>
                    <div class="available">AVAILABLE</div>
                </div>
                <div class="price-right">Check Availability &#9660;</div>
            </div>
            <div class="text">
                {{ $comic['description'] }}
            </div>
        </div>
        <div class="col adv">
            <img src="{{ asset('images/adv.jpg') }}" alt="adv">
        </div>
    </div>

    {{-- section info comic --}}
    <div class="info-box">
        <div class="info container">
            
            {{-- talent --}}
            <div class="talent">
                <h3>Talent</h3>
                <div class="art">
                    <p>Art by:</p>
                    <div class="artists">
                        @foreach ($comic['artists'] as $artist)
                           @if (!$loop->last)
                               {{ $artist }},
                           @else
                               {{ $artist }}
                           @endif
                        @endforeach
                    </div>
                </div>
                <div class="written">
                    <p>Written by:</p>
                    <div class="writers">
                        @foreach ($comic['writers'] as $writer)
                           @if (!$loop->last)
                               {{ $writer }},
                           @else
                               {{ $writer }}
                           @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- specs --}}
            <div class="specs">
                <h3>Specs</h3>
                <div class="series">
                    <p>Series:</p>
                    <div class="series-name">
                        {{ $comic['series'] }}
                    </div>
                </div>
                <div class="us-price">
                    <p>U.S. Price:</p>
                    <div class="price-value">
                        {{ $comic['price'] }}
                    </div>
                </div>
                <div class="onsale-date">
                    <p>On Sale Date:</p>
                    <div class="date">
                        {{ $comic['sale_date'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection