@extends('layouts.app')

@section('content')
    <div class="container">
        <calc-credit-component :credit="{{$credit}}"
                               :url_score="{{json_encode(route('profile.open.credit'))}}"
        ></calc-credit-component>
    </div>
@endsection
