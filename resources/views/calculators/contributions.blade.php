@extends('layouts.app')

@section('content')
    <div class="container">
        <calc-contributions-component :contributions="{{$contributions}}"
                                      :url_score="{{json_encode(route('profile.open.contribution'))}}">
        </calc-contributions-component>
    </div>
@endsection
