@extends('layouts.master')

{{-- {{ dd($product) }} --}}
@section('content')
    @if ($cart->hasItems())
        @include('pages.partial.shoppingCart')
    @endif

    <h1 class="display-1 pt-3">{{ $productContent->name }}</h1>
    <p>€ {{ number_format(($product->price / 100), 2, ',', '.') }}</p>

    <main>
        {!! $productContent->description !!}
    </main>

    <div class="mt-2">
        <form method="POST" action="{{ route('shop.cart', $locale) }}">
            @csrf

            <label for="quantity">
                @lang('app.form.quantity')
            </label>
            <input type="number" class="form-control" id="quantity" name="quantity">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="hidden" value="{{ $product->id }}" name="product_id" />

            <div>
                <button type="submit" class="btn btn-success mt-2">
                    @lang('app.add_to_cart')
                </button>
            </div>
        </form>
    </div>
@endsection
