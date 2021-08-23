@extends('layouts.master')

@section('content')
    <div class="text-center">
        <h1>@lang('app.order') #{{ $order->id }}</h1>

        @if($order->status == 'paid')
            <h2>@lang('app.order_succes')</h2>
        @else
            <h2>@lang('app.order_status') {{ $order->status }}</h2>
        @endif

        <a href="{{ route('pages.home') }}" class="btn btn-primary">
            @lang('app.back')
        </a>
    </div>
@endsection
