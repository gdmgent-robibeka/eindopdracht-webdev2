<div class="bg-primary">
    <div class="container d-flex py-3 justify-content-between">
        <nav>
            @foreach ($pages as $page)
                <a href="{{ route('pages.page', [$locale, $page->slug]) }}"
                    class="text-white text-decoration-none mr-2 @if(request()->is('*/' . $page->slug . '')) fw-bold @endif">
                    {{ $page->title }}
                </a>
            @endforeach
        </nav>
        <nav>
            @foreach (Config::get('app.locale_all'); as $loc)
                <a href="{{ route('pages.home', $loc) }}" class="text-white text-decoration-none mr-2">
                    {{ $loc }}
                </a>
            @endforeach
        </nav>
    </div>
</div>
