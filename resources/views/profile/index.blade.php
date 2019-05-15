@extends('layouts.app')

@section('content')
    <div class="container">
        Страница профиля
        <?php var_dump($user->client->user_id);die;?>
    </div>
@endsection
