@extends('layouts.app')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">Данные клиента</h4>
                </div>

                <div class="hr_gradient mb-4"></div>

                <form class="form" action="{{route('profile.update')}}" method="post">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Имя аккаунта:</label>
                        <input type="text" class="form-control" name="name" placeholder="Имя аккаунта" value="{{$user->name ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Фамилия:</label>
                        <input type="text" class="form-control" name="surname" placeholder="Фамилия" value="{{$user->client->surname ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Имя:</label>
                        <input type="text" class="form-control" name="client_name" placeholder="Имя" value="{{$user->client->name ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Отчество:</label>
                        <input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{$user->client->patronymic ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Телефон:</label>
                        <input type="text" class="form-control" name="phone" placeholder="Телефон" value="{{$user->client->phone ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Почта:</label>
                        <input type="text" class="form-control" name="email" placeholder="Почта" value="{{$user->email ?? ''}}">
                    </div>

                    <div class="form-group">
                        <label for="">Дата рождения:</label>
                        <input type="date" class="form-control" name="dateOfBirth" placeholder="Дата рождения" value="{{$user->client->dateOfBirth ?? '' }}">
                    </div>

                    <hr>

                    <h4>Данные паспорта</h4>

                    <div class="form-group">
                        <label for="">Серия:</label>
                        <input type="text" class="form-control" name="series" placeholder="Серия" value="{{$user->client->series ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Номер:</label>
                        <input type="text" class="form-control" name="number" placeholder="Номер" value="{{$user->client->number ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Адрес прописки:</label>
                        <input type="text" class="form-control" name="address" placeholder="Адрес прописки" value="{{$user->client->address ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Дата выдачи:</label>
                        <input type="date" class="form-control" name="dateOfIssues" placeholder="Дата выдачи" value="{{$user->client->dateOfIssues ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="">Кем выдан:</label>
                        <input type="text" class="form-control" name="issued" placeholder="Кем выдан" value="{{$user->client->issued ?? '' }}">
                    </div>

                    <hr>

                    <input type="submit" class="btn btn-success" value="Сохранить">

                </form>

            </div>
        </div>
        </transition>
    </div>
@endsection
