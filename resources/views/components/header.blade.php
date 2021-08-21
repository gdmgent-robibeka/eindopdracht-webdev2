<nav>
    @foreach ($pages as $page)
        <a href="{{ route('pages.page', [$locale, $page->slug]) }}">
            {{ $page->title }}
        </a>
    @endforeach
</nav>

<nav>
    @foreach (Config::get('app.locale_all'); as $loc)
        <a href="{{ route('pages.home', $loc) }}">
            {{ $loc }}
        </a>
    @endforeach
</nav>
