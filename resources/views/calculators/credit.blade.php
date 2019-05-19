@extends('layouts.app')

@section('content')
    <div class="container">
        <calc-credit-component :credit="{{$credit}}"></calc-credit-component>
    </div>
@endsection
