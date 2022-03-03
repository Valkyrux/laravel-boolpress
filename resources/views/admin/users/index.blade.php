@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row row-cols-3">
        @foreach($user_names as $user_name)
            <div class="col">
                <div class="card mb-3 text-center">
                    <div class="card-img-top pt-3">
                        <img class="border rounded w-25" src="{{asset('img/default-user.png')}}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$user_name}}</h5>
                        <a href="#" class="text-secondary text-decoration-none">Informazioni</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection