@extends('layouts.app')

@section('content')
    <div class="container">
        <calc-contributions-component :contributions="{{$contributions}}"
                                      :url_score="{{json_encode(route('profile.score'))}}">
        </calc-contributions-component>
    </div>
@endsection
