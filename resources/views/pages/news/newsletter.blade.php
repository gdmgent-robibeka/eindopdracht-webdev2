@extends('layouts.master')

@section('content')
    <h1 class="display-1 mt-3">@lang('app.sign_up')</h1>

    <form method="POST" action="{{ route('newsletter') }}">
        @csrf

        <div class="mt-5">
            <label for="email" class="form-label">
                @lang('app.form.email')
            </label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                @lang('app.send')
            </button>
        </div>
    </form>
@endsection
