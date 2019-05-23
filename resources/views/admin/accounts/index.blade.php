@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">

                    <accounts-tab-admin-component :accounts="{{$data}}">
                    </accounts-tab-admin-component>

                </div>
            </div>
    </div>
@endsection
