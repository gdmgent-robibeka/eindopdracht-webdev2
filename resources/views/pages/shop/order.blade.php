@extends('layouts.master')

@section('content')
    @if ($cart->hasItems())
        @include('pages.partial.shoppingCart', [
            'finalize' => true,
        ])
    @endif

    <h2 class="mt-3">
        @lang('app.info')
    </h2>

    <form method="POST" action="{{ route('shop.order', $locale) }}">
        @csrf

        <div class="mb-3">
            <label for="first_name">
                @lang('app.form.first_name')*
            </label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name">
                @lang('app.form.last_name')*
            </label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address">
                @lang('app.form.address')*
            </label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="postal_code">
                @lang('app.form.postal_code')*
            </label>
            <input type="number" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
            @error('postal_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city">
                @lang('app.form.city')*
            </label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            @error('city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="county">
                @lang('app.form.county')*
            </label>
            <input type="text" class="form-control" id="county" name="county" value="{{ old('county') }}">
            @error('county')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">
                @lang('app.form.email')*
            </label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            @lang('app.pay')
        </button>
    </form>

    <a href="{{ route('pages.home') }}" class="btn btn-danger mt-3">
        @lang('app.cancel')
    </a>
@endsection

