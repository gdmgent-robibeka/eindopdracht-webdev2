@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="display-1 mt-3">{{ $content->title }}</h1>
        <main>
            {!! $content->content !!}
        </main>
    </div>
@endsection

