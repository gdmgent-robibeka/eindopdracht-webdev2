@foreach ($productContents as $productContent)
    <div class="mt-4">
        <h2 class="h3">{{ $productContent->name }}</h2>

        <div>
            <a href="{{ route('shop.product', [$locale, $productContent->slug]) }}" class="btn btn-primary">
                @lang('app.more')
            </a>
        </div>
    </div>
@endforeach
