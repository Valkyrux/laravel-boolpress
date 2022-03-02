@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.adminDashboard')
        <div class="col-md-8">
            {{-- <button class="btn btn-primary mb-2"><a class="text-light text-decoration-none" href="{{route('admin.create')}}">Aggiungi un post</a></button> --}}
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
