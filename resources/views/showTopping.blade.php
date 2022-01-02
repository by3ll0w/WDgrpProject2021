@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <br>
        <h1>Toppings</h1><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($toppings as $topping)
                <tr>
                    <td>{{$topping->id}}</td>
                    <td>{{$topping->name}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <a class="btn btn-danger" href='{{ route("addTopping") }}'>
        {{ __('Add New') }}
    </a><br>
    </div>

    <div class="col-sm-3"></div>



</div>
@endsection