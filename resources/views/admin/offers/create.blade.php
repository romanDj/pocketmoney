@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание предложения @endslot
            @slot('parent') Главная @endslot
            @slot('active') Предложения @endslot
        @endcomponent
        <hr>

        <form class="form" action="{{route('admin.offers.store')}}" method="post">
            {{ csrf_field() }}
            @include('admin.offers.partials.form')
        </form>

    </div>
@endsection