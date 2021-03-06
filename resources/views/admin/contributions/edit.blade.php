@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование вклада @endslot
            @slot('parent') Главная @endslot
            @slot('active') Вклады @endslot
        @endcomponent
        <hr>

        <form class="form" action="{{route('admin.contributions.update', $contribution)}}" method="post">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            @include('admin.contributions.partials.form')
        </form>

    </div>
@endsection
