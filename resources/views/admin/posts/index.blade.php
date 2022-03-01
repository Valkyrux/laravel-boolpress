@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('partials.adminDashboard')
        <div class="col-md-8">
            {{-- <button class="btn btn-primary mb-2"><a class="text-light text-decoration-none" href="{{route('admin.create')}}">Aggiungi un post</a></button> --}}
            @foreach ($posts as $post)
                <div class="card mb-3 {{($post->user_id == Auth::id())?'border-primary':''}}">
                    <div class="card-header"><h5>{{ $post->title }}</h5></div>
                    <div class="card-body">
                        <p>{{$post->content}}</p>
                        <div class="text-end">
                            <small class="form-text">{{date_format($post->created_at, 'd/m/Y H:i')}}</small>
                        </div>
                        <div>
                            <a href="{{route('admin.posts.show'), $post}}" class="text-secondary text-decoration-none">mostra</a>
                            <a href="{{route('admin.posts.edit'), $post}}" class="text-decoration-none">modifica</a>
                            <a href="{{}}" class="text-danger text-decoration-none">cancella</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection