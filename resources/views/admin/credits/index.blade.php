@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="text-info">Кредиты</h4>

            <a href="{{route('admin.credits.create')}}" class="btn btn-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Добавить</p>
                    <i class="ml-2 fas fa-plus"></i>
                </div>
            </a>
        </div>
        <hr>

        @forelse($credits as $credit)

            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">{{$credit->name}}</h5>
                        <div class="d-flex align-items-center">
                            <a href="{{route('admin.credits.edit',['id'=> $credit])}}"><i class="far fa-edit"></i></a>
                            <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                  action="{{route('admin.credits.destroy', $credit)}}" method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="ml-2 text-danger btn p-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p>{{$credit->requirements}}</p>
                                <p class="text-info">Минимальный срок от {{$credit->min_term}} месяцев</p>
                            </div>
                            <div class="border-left border-secondary pl-3">
                                <h3>{{$credit->percent}}%</h3> годовых
                            </div>
                        </div>


                    </blockquote>
                </div>
            </div>
        @empty

            <h5 class="text-secondary text-center">Данные отсутствуют</h5>
        @endforelse
    </div>
@endsection