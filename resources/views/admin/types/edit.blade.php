@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование типа @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent
        <hr>

        <form class="form" action="{{route('admin.types.update', $type)}}" method="post">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            @include('admin.types.partials.form')
        </form>

    </div>
@endsection
