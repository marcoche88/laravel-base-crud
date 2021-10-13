<header class="my-container">
    <figure>
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/dc-logo.png') }}" alt="logo" />
      </a>
    </figure>
    <nav class="h-100">
      <ul>
          <li><a class="{{ request()->routeIs('comics.index') ? 'active' : '' }}" href="{{ route('comics.index') }}">Comics</a></li>
          <li><a class="{{ request()->routeIs('comics.create') ? 'active' : '' }}" href="{{ route('comics.create') }}">Aggiungi comics</a></li>
      </ul>
    </nav>
  </header>