@extends('layouts.app')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">Данные клиента</h4>
                    <a href="{{route('profile.edit')}}">редактировать <i class="far fa-edit"></i></a>
                </div>

                <div class="hr_gradient mb-4"></div>

                <div class="d-flex">
                    <h5>Имя аккаунта:</h5>
                    <h5 class="ml-2 text-muted">{{$user->name ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Фамилия:</h5>
                    <h5 class="ml-2 text-muted"> {{$user->client->surname ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Имя:</h5>
                    <h5 class="ml-2 text-muted"> {{$user->client->name ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Отчество:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->patronymic ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Телефон:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->phone ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Почта:</h5>
                    <h5 class="ml-2 text-muted">{{$user->email ?? 'нет данных'}}</h5>
                </div>
                <div class="d-flex">
                    <h5>Дата рождения:</h5>
                    <h5 class="ml-2 text-muted">{{ $user->client->dateOfBirth ? $user->client->dateOfBirth->format('d.m.Y')  : 'нет данных' }}</h5>
                </div>

                <hr>

                <h4>Данные паспорта</h4>

                <div class="d-flex">
                    <h5>Серия:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->series ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Номер:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->number ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Адрес прописки:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->address ?? 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Дата выдачи:</h5>
                    <h5 class="ml-2 text-muted">{{ $user->client->dateOfIssues ? $user->client->dateOfIssues->format('d.m.Y')  : 'нет данных' }}</h5>
                </div>
                <div class="d-flex">
                    <h5>Кем выдан:</h5>
                    <h5 class="ml-2 text-muted">{{$user->client->issued ?? 'нет данных' }}</h5>
                </div>

                <hr>

                <p class="text-muted mb-2">Дата создания аккаунта: {{$user->client->created_at ?? '-'}}</p>
                <p class="text-muted">Дата последних изменений аккаунта: {{$user->client->updated_at ?? '-'}}</p>
            </div>
        </div>
        </transition>
    </div>
@endsection
