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
        <div class="col-md-10">
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:184px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=34&cat=11&showGetBtn=0&w=0&from=2&to=11111&amount=1"></iframe>
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:235px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=9&cat=7&title=%D0%9A%D1%83%D1%80%D1%81%D1%8B%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%20%D0%A6%D0%91%20%D0%A0%D0%A4&texts=%7B%22toolTitle%22%3A%22%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0%22%2C%22todayCourse%22%3A%22RUB%22%7D&mult=1&showGetBtn=0&hideHeader=0&hideDate=0&w=0&codes=1&colors=false&items=2%2C21&columns=todayCourse&toCur=11111"></iframe>
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:409px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=11&cat=9&title=%D0%9A%D1%83%D1%80%D1%81%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%20%D0%BD%D0%B0%20%D0%BC%D0%B5%D0%B6%D0%B1%D0%B0%D0%BD%D0%BA%D0%B5&texts=%7B%22toolTitle%22%3A%22%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0%22%2C%22bid%22%3A%22%D0%A6%D0%B5%D0%BD%D0%B0%22%2C%22ask%22%3A%22%D0%A1%D0%BF%D1%80%D0%BE%D1%81%22%2C%22chgPer%22%3A%22%D0%98%D0%B7%D0%BC.%20%25%22%7D&mult=1&showGetBtn=0&w=0&colors=false&items=54%2C99%2C115%2C107%2C63%2C25456%2C105&columns=bid%2Cask%2CchgPer"></iframe>
        </div>

    </div>
</div>
@endsection
