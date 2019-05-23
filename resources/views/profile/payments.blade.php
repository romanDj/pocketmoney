@extends('layouts.app')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">График платежей по кредиту</h4>
                </div>

                <div class="hr_gradient mb-4"></div>

                <div class="jumbotron none-print mb-3 p-2">
                    <div class="d-flex justify-content-between">
                        <a href="{{URL::previous()}}" ><i class="fas fa-arrow-left"></i> счета</a>
                        <a href="#" @click.prevent="printWindow"><i class="fas fa-print"></i> печать pdf</a>
                    </div>
                </div>

                <payments-component :summ="{{$summ}}"
                                    :time="{{$period}}"
                                    :percent="{{$percent}}"
                                    :created_at="{{json_encode($created_at->format('d.m.Y'))}}"></payments-component>

            </div>
        </div>
        </transition>
    </div>
@endsection
