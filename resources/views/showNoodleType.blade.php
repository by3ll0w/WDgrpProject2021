@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        
        <br><h1>Noodle Types</h1><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($noodle_types as $noodletype)
                <tr>
                    <td>{{$noodletype->id}}</td>
                    <td>{{$noodletype->name}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <a class="btn btn-danger" href='{{ route("addNoodleType") }}'>
        {{ __('Add New') }}
    </a><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection