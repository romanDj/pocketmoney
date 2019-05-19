@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-11">
            <div class="jumbotron my_jumbotron shadow">
                <h1 class="display-5 text-center text-white opacity_my">Банк PocketMoney</h1>
                <h3 class="text-center text-white-50">Наши предложения <i class="fas fa-arrow-down"></i></h3>
            </div>
        </div>

        <div class="col-md-8">
            <h3 class="font-weight-bold text-purple">Вклады</h3>
            <div class="hr_gradient mb-3"></div>
            <div class="card-columns mb-2">

                @foreach($contributions as $contribution)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-purple">{{$contribution->name}}</h5>
                            <hr>

                            <p class="mb-2">&mdash; {{$contribution->isReplenishment ? 'Пополняемый': 'Без пополнения' }}</p>
                            <p class="mb-2">&mdash; {{$contribution->isWithdrawal ? 'Есть возможность снятия': 'Без снятия' }}</p>
                            <p class="mb-2">&mdash; {{$contribution->isCapitalization ? 'С капитализацией': 'Без капитализации' }}</p>

                            <p class="card-text font-weight-bold text-purple">Минимальный срок от {{$contribution->min_term}} месяцев</p>
                            <h4 class="card-text font-weight-bold text-success">{{$contribution->percent}}% годовых</h4>

                        </div>
                    </div>
                @endforeach

            </div>
            <a href="{{route('calc.contribution')}}" class="btn btn-outline-success d-block mb-4">Рассчитать и сравнить <i class="fas fa-arrow-right"></i></a>
            <h3 class="font-weight-bold text-purple">Кредиты</h3>
            <div class="hr_gradient mb-3"></div>
            <div class="card-columns mb-4">
                @foreach($credits as $credit)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-purple">{{$credit->name}}</h5>
                            <hr>
                            <p class="card-text">{{$credit->requirements}}</p>
                            <p class="card-text font-weight-bold text-purple">Минимальный срок от {{$credit->min_term}} месяцев</p>
                            <h4 class="card-text font-weight-bold text-success">{{$credit->percent}}% годовых</h4>
                            <a href="{{route('calc.credit', $credit)}}" >
                                Рассчитать
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
