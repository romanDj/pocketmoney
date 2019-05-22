@extends('admin.layouts.app_admin')

@section('content')
   <div class="container">
         <div class="row justify-content-center">
            <div class="jumbotron m-1">
               <h5>Количество клиентов: {{$count_client}}</h5>
            </div>
            <div class="jumbotron m-1">
               <h5>Количество заключенных договоров: {{$count_contract}}</h5>
            </div>
         </div>
   </div>
@endsection
