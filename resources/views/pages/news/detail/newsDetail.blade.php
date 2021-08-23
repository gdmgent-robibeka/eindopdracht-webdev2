@extends('layouts.master')

@section('content')
    <h1 class="display-1 pt-3">{{ $newsContent->title }}</h1>

    <section class="mt-5">
        {!! $newsContent->intro !!}
    </section>

    <main class="mt-4">
        {!! $newsContent->content !!}
    </main>
@endsection
