@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Topping</h3>


        <form action="{{route('addTopping')}}" method="POST">
            <div class="form-group">
                @CSRF
                <label for="addTopping">Add New Topping</label>
                <input class="form-control" type="text" id="toppingName" name="toppingName" required>

            </div>
<button type="submit" class="btn btn-primary">Add New</button>
        </form>
        

        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection