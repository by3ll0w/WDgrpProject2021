@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Noodle Type</h3>


        <form action="{{route('addNoodleType')}}" method="POST">
            <div class="form-group">
                @CSRF
                <label for="addNoodleType">Add New Topping</label>
                <input class="form-control" type="text" id="noodleTypeName" name="noodleTypeName" required>

            </div>
<button type="submit" class="btn btn-primary">Add New</button>
        </form>
        

        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection