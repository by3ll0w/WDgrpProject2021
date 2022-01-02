@extends('layouts/customerlayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Topping</td>
                    <td>Noodle</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Price (unit)</td>
                    <td>Price (Total)</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($food as $food)
                <tr>

                    <td>{{$food->ToppingName}}</td>
                    <td>{{$food->Noodle}}</td>
                    <td>{{$food->size}}</td>
                    <td>{{$food->quantity}}</td>
                    <td>{{$food->unitPrice}}</td>
                    <td>{{$food->totalPrice}}</td>

                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            <h1>Total: RM
                @foreach($cart as $cart)
                {{$cart->amount}}
                @endforeach
            </h1>

            <a class="btn btn-danger" href='{{ route("checkout") }}'>
        {{ __('Checkout') }}
    </a>
       
       
        </div>
    </div>
    <div class="col-sm-3">

    </div>



</div>
@endsection