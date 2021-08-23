@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="display-1 pt-3">{{ $content->title }}</h1>
        <main>
            {!! $content->content !!}
        </main>

        @if (request()->is('*/contact'))
            @include('pages.partial.contactForm')
        @endif
    </div>

@endsection

