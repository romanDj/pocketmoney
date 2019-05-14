@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="text-info">Вклады</h4>

            <a href="{{route('admin.contributions.create')}}" class="btn btn-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Добавить</p>
                    <i class="ml-2 fas fa-plus"></i>
                </div>
            </a>
        </div>
        <hr>

        @forelse($contributions as $contribution)

            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">{{$contribution->name}}</h5>
                        <div class="d-flex align-items-center">
                            <a href="{{route('admin.contributions.edit',['id'=> $contribution])}}"><i class="far fa-edit"></i></a>
                            <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                  action="{{route('admin.contributions.destroy', $contribution)}}" method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="ml-2 text-danger btn p-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <div class="d-flex justify-content-start align-items-center">

                            <div class="border-right border-secondary pr-3 align-self-stretch mr-3 d-flex align-items-center">
                                <div>
                                    <h3>{{$contribution->percent}}%</h3> годовых
                                </div>
                            </div>
                            <div>
                                <p class="card-text mb-0">{{ $contribution->isReplenishment ? 'Пополняемый': 'Без пополнения'  }}</p>
                                <p class="card-text mb-0">{{ $contribution->isWithdrawal ? 'Есть возможность снятия': 'Без снятия'  }}</p>
                                <p class="card-text mb-0">{{ $contribution->isCapitalization? 'С капитализацией': 'Без капитализации'  }}</p>

                                <p class="text-info">Минимальный срок от {{$contribution->min_term}} месяцев</p>
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