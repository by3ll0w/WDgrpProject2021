@extends('layouts.customerlayout')

@section('content')
<div class="row" style=" margin-top:20px;margin-left:10px">

{{ Auth::user()->id }}

</div> 
@endsection