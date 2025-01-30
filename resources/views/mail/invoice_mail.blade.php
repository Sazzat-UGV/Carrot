<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" rel="icon" />
    <title>Invoice</title>
    <meta name="author" content="harnishdesign.net" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/invoice') }}/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/invoice') }}/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/invoice') }}/stylesheet.css" />
</head>

<body>
    <div class="container-fluid invoice-container">
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" title="carrot"
                        alt="image" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr />
        </header>
        <main>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Date:</strong> {{ Date('d/m/Y') }}
                </div>
                <div class="col-sm-6 text-sm-end">
                    <strong>Invoice No:</strong> {{ $order->order_id }}
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1">
                    <strong>Pay To:</strong>
                    <address>
                        {{ $setting->site_name }}<br />
                        {{ $setting->physical_address }}<br />
                        {{ $setting->phone_number }}<br />
                        {{ $setting->email }}
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0">
                    <strong>Invoiced To:</strong>
                    <address>
                        {{ $order->name }}<br />
                        {{ $order->address }}<br />
                        {{ $order->email }}<br />
                        {{ $order->city }} {{ $order->post }}
                    </address>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light">
                            <td class="col-3"><strong>Product</strong></td>
                            <td class="col-2 text-center">
                                <strong>Rate</strong>
                            </td>
                            <td class="col-1 text-center">
                                <strong>QTY</strong>
                            </td>
                            <td class="col-2 text-end">
                                <strong>Amount</strong>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_content as $row)
                            <tr>
                                <td class="col-3">{{ $row->name }}</td>
                                <td class="col-2 text-center">{{ $setting->currency }}{{ $row->price }}</td>
                                <td class="col-1 text-center">{{ $row->qty }}</td>
                                <td class="col-2 text-end">{{ $setting->currency }}{{ $row->price * $row->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @php
                $delivery_charge = 0;
            @endphp
            <div class="table-responsive">
                <table class="table border border-top-0 mb-0">
                    <tr class="bg-light">
                        <td class="text-end">
                            <strong>Sub Total:</strong>
                        </td>
                        <td class="col-sm-2 text-end">{{ $setting->currency }}{{ Cart::subtotal() }}</td>
                    </tr>
                    @if (Session::has('coupon'))
                        <tr class="bg-light">
                            <td class="text-end">
                                <strong>Coupon:({{ Session::get('coupon')['name'] }})</strong>
                            </td>
                            <td class="col-sm-2 text-end">
                                {{ $setting->currency }}{{ Session::get('coupon')['discount'] }}</td>
                        </tr>
                    @endif
                    <tr class="bg-light">
                        <td class="text-end"><strong>Tax:(5%)</strong></td>
                        <td class="col-sm-2 text-end">{{ $setting->currency }}{{ Cart::tax() }}</td>
                    </tr>
                    @if (Session::has('coupon'))
                        <tr class="bg-light">
                            <td class="text-end"><strong>Total:</strong></td>
                            <td class="col-sm-2 text-end">
                                {{ $setting->currency }}{{ Session::get('coupon')['after_discount'] + Cart::tax() }}
                            </td>
                        </tr>
                    @else
                        <tr class="bg-light">
                            <td class="text-end"><strong>Total:</strong></td>
                            <td class="col-sm-2 text-end">
                                {{ $setting->currency }}{{ Cart::total() }}</td>
                        </tr>
                    @endif

                </table>
            </div>
        </main>
        <footer class="text-center mt-4">
            <p class="text-1">
                <strong>NOTE :</strong> This is computer generated receipt
                and does not require physical signature.
            </p>

        </footer>
    </div>
</body>

</html>
