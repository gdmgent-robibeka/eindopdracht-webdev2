@foreach ($productContents as $productContent)
    <div class="mt-4">
        <h3>{{ $productContent->name }}</h3>

        <div>
            <a href="{{ route('shop.product', [$locale, $productContent->slug]) }}" class="btn btn-primary">
                @lang('app.more')
            </a>
        </div>
    </div>
@endforeach
