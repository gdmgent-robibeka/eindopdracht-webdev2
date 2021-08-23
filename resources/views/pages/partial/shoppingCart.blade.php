<div class="mt-3 border p-4 rounded-3 bg-light bg-gradient">
    <h2 class="h3">@lang('app.cart')</h2>

    <table class="table w-50">
        <tbody>
            @foreach($cart->items as $item)
                <tr>
                    <td>{{ $item->quantity }}x</td>
                    <td>{{ $item->name }}</td>
                    <td>€ {{ number_format(($item->price / 100), 2, ',', '.') }}</td>
                    <td>€ {{ number_format(($item->getTotal() / 100), 2, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="2"></td>
                <td>Total</td>
                <td>€ {{ number_format(($cart->getTotal() / 100), 2, ',', '.') }}</td>

            </tr>
        </tbody>
    </table>

    @if (!$finalize)
        <a href="{{ route('shop.order', $locale) }}" class="btn btn-success">
            @lang('app.pay')
        </a>
    @endif
</div>
