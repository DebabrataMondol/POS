@extends('admin.base')

@section('content')

    <style type="text/css">
        .row {
            margin: 0px;
        }

        h2 {
            height: 40px;
        }

        header {
            display: none !important;
        }

        nav {
            display: none !important;
        }

    </style>
    <div class="card">
    <div class="row">
        <?php $i=0 ?>
        @foreach($cartItems as $cartItem)
            @for($i=0;$i<$cartItem->options['printqty'];$i++)
                <div style="text-align: center;margin: 0px;" class="col-md-2">
                    <p style="font-size: 12px;margin-bottom: 0px; padding-bottom: 0px;"><b>@foreach($companys as $company){{ $company->company_name }} @endforeach</b></p>
                    <h2>{!! DNS1D::getBarcodeHTML($cartItem->id, 'C128')!!}</h2>
                    <p style="font-size: 10px; margin-top: 40px;margin-bottom: 0px; ">{{ $cartItem->id }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $cartItem->id }}</p>
                    <p style="font-size: 10px; margin-top: 0px; padding-top: 0px;margin-bottom: 0px;padding-bottom: 0px;"><b>{{ $cartItem->name }}</b></p>
                    <p style="font-size: 10px; margin-top: 0px; padding-top: 0px;"><b>Price:&nbsp;{{ $cartItem->price }}Tk.</b></p>
                </div>
                @endfor
            <br>
        @endforeach
    </div>
    </div>
@endsection
