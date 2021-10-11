<header class="container">
    <figure>
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/dc-logo.png') }}" alt="logo" />
      </a>
    </figure>
    <nav class="h-100">
      <ul>
        @foreach ($links as $link)
            <li><a class="{{ request()->routeIs($link['route']) ? 'active' : '' }}" href="{{ route($link['route']) }}">{{ $link['text'] }}</a></li>
        @endforeach
      </ul>
    </nav>
  </header>