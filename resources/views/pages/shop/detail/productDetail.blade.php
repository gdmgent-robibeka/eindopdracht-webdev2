@extends('layouts.master')

{{-- {{ dd($product) }} --}}
@section('content')
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
            <input type="text" class="form-control" id="quantity" name="quantity">

            <input type="hidden" value="{{ $product->id }}" name="product_id" />

            <button type="submit" class="btn btn-success mt-2">
                @lang('app.add_to_cart')
            </button>
        </form>
    </div>
@endsection
