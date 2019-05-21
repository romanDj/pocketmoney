@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">Счета в банке</h4>
                </div>

                <div class="hr_gradient mb-4"></div>

                <accounts-tab-component :accounts="{{$data}}">
                </accounts-tab-component>

            </div>
        </div>

    </div>
@endsection
