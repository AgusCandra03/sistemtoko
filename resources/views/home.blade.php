@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Welcome {{ Auth::user()->name }} !</h2>
</div>
@endsection