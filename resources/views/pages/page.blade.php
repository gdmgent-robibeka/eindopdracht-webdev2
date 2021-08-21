@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="display-1 pt-3">{{ $content->title }}</h1>
        <main>
            {!! $content->content !!}
        </main>

        @if (request()->is('*/contact'))
            <form method="POST" action="{{ route('pages.contact') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Tekst</label>
                    <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Verzend
                    </button>
                </div>

            </form>
        @endif
    </div>

@endsection

