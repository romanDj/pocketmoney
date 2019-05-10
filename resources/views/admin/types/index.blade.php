@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="text-info">Типы</h4>
            <a href="{{route('admin.types.create')}}" class="btn btn-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Добавить</p>
                    <i class="ml-2 fas fa-plus"></i>
                </div>
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($types as $type)
            <tr>
                <td>{{$type->name}}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{route('admin.types.edit', ['id'=>$type])}}"><i class="far fa-edit"></i></a>
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                              action="{{route('admin.types.destroy', $type)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="ml-2 text-danger btn p-0"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
                <td colspan="2" class="text-center">
                    <h5 class="text-secondary">Данные отсутствуют</h5>
                </td>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection