@extends('layouts.app')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">Выплата по кредиту</h4>
                </div>

                <div class="hr_gradient mb-4"></div>

                @if($thisMonth)
                <form class="form"  method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Фиксированный ежемесячный платёж (руб.):</label>
                        <input type="text" class="form-control" name="name" value="{{$monthly_payment ?? '99' }}" disabled>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-success" value="Оплатить">
                </form>
                @else
                    <h5 class="text-secondary text-center">В текущем месяце ежемесячная плата уже внесена</h5>
                @endif
            </div>
        </div>
        </transition>
    </div>
@endsection
