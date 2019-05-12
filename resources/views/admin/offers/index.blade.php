@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="text-info">Предложения для клиентов</h4>

            <a href="{{route('admin.offers.create', [ 'id' => 2 ])}}" class="btn btn-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Добавить</p>
                    <i class="ml-2 fas fa-plus"></i>
                </div>
            </a>
        </div>

        @forelse($offers as $offer)

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0">{{$offer->name}}</h5>
                    <div class="d-flex align-items-center">
                        <a href=""><i class="far fa-edit"></i></a>
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="ml-2 text-danger btn p-0"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
        @empty
            <hr>
            <h5 class="text-secondary text-center">Данные отсутствуют</h5>
        @endforelse

        <offers-tab-component :offers="{{$offers}}"></offers-tab-component>
    </div>
@endsection