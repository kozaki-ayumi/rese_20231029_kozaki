<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <title>StripePayment</title>
</head>
<body>
    <div class="payment">
        <div class="title">
            <button class="back__btn" onClick="history.back()"><</button>
            <h1 class="title__content">Stripe決済</h1>
        </div>
        <div class="amount__form">
            <p class="amount">金額</p>
            <p>¥{{ $amount['amount'] }}</p>
        </div>
        <div class="card-body">
            <form action="{{ asset('payment') }}" method="POST">
                @csrf
            <input type="hidden" name="amount" value="{{$amount['amount']}}">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{$amount['amount']}}"
                data-name="Stripe決済デモ"
                data-label="決済をする"
                data-description="これはデモ決済です"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="JPY">
            </script>
            </form>
        </div>
    </div>
</body>
</html>