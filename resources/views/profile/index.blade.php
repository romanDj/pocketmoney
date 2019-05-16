@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h4 class="text-purple mb-0 mr-2">Данные клиента</h4>
                    <a href="#">редактировать <i class="far fa-edit"></i></a>
                </div>

                <div class="hr_gradient mb-4"></div>
                <p class="font-weight-bold">Имя аккаунта: {{$user->name }}</p>


                <p class="font-weight-bold">Фамилия: {{$user->client->surname ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Имя:  {{$user->client->name ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Отчество: {{$user->client->patronymic ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Телефон:  {{$user->client->phone ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Почта: {{$user->email}}</p>
                <p class="font-weight-bold">Дата рождения:  {{$user->client->dateOfBirth ?? 'Нет данных' }}</p>

                <hr>

                <h4>Данные паспорта</h4>
                <p class="font-weight-bold">Серия:  {{$user->client->series ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Номер:  {{$user->client->number ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Адрес прописки:  {{$user->client->address ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Дата выдачи:  {{$user->client->dateOfIssues ?? 'Нет данных' }}</p>
                <p class="font-weight-bold">Кем выдан:  {{$user->client->issued ?? 'Нет данных' }}</p>



                <hr>
                <p class="text-muted mb-2">Дата создания аккаунта: {{$user->client->created_at}}</p>
                <p class="text-muted">Дата последних изменений аккаунта: {{$user->client->updated_at}}</p>
            </div>
        </div>

    </div>
@endsection
