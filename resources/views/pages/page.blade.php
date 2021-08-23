@extends('layouts.master')

@section('content')

    <h1 class="display-1 pt-3">{{ $content->title }}</h1>
    <main>
        {!! $content->content !!}
    </main>

    @if (request()->is('*/contact'))
        @include('pages.partial.contactForm')
    @endif

    @if (request()->is('*/shop'))
        @include('pages.shop.index')
    @endif

    @if (request()->is('*/news') || request()->is('*/nieuws'))
        @include('pages.news.index')
    @endif

@endsection

