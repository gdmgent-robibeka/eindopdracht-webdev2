@foreach ($newsContents as $newsContent)
    <div class="mt-4 p-3 border rounded-3">
        <h2 class="h3">{{ $newsContent->title }}</h2>
        <section>
            {!! $newsContent->intro !!}
        </section>
        <div>
            <a href="{{ route('pages.news', [$locale, $newsContent->slug]) }}" class="btn btn-primary mt-3">
                @lang('app.more')
            </a>
        </div>
    </div>
@endforeach

<div class="mt-3">
    {{ $newsContents->links() }}
</div>
