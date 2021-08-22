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
                    <label for="name">
                        @lang('app.form.name')*
                    </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        @lang('app.form.email')*
                    </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="phone">
                        @lang('app.form.phone')
                    </label>
                    <input type="number" class="form-control" id="phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="subject">
                        @lang('app.form.subject')*
                    </label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">
                        @lang('app.form.content')*
                    </label>
                    <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
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

