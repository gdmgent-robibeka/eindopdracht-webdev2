@extends('layouts.master')

@section('content')
    <h1>{{ $content->title }}</h1>

    <main>
        {!! $content->content !!}
    </main>
@endsection

