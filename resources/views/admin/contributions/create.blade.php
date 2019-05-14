@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание кредита @endslot
            @slot('parent') Главная @endslot
            @slot('active') Кредиты @endslot
        @endcomponent
        <hr>


        <form class="form" action="{{route('admin.credits.store')}}" method="post">
            {{ csrf_field() }}
            @include('admin.credits.partials.form')
        </form>

    </div>
@endsection