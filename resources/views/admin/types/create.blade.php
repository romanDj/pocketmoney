@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание типа @endslot
            @slot('parent') Главная @endslot
            @slot('active') Типы @endslot
        @endcomponent
        <hr>

        <form class="form" action="{{route('admin.types.store')}}" method="post">
            {{ csrf_field() }}
            @include('admin.types.partials.form')
        </form>

    </div>
@endsection