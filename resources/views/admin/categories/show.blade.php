@extends('layouts.app')

@section('content')
<div><a href="{{route('admin.posts.create')}}" class="text-decoration-none fs-5"><i class="bi bi-plus-square"></i> Pubblica un Post</a></div>
<h1 class="mb-2 fs-5 text-secondary text-uppercase">{{$category->name}}</h1>
    @foreach ($posts as $post)
        <div class="card post-block mb-4 {{($post->user_id == Auth::id())?'border-primary':''}}">
            <div class="card-header"><h5>{{ $post->title }}</h5></div>
            <div class="card-body">
                <p class="mt-3">{{$post->content}}</p>
                <div class="text-end">
                    <small class="form-text">{{date_format($post->created_at, 'd/m/Y H:i')}}</small>
                </div>
                <div class="action-box">
                    <a href="{{route('admin.posts.show', $post)}}" class="text-secondary text-decoration-none d-inline-block me-3">dettagli</a>
                    @if($post->user_id == Auth::id())
                        <a href="{{route('admin.posts.edit', $post)}}" class="text-decoration-none d-inline-block me-3">modifica</a>
                        <a href="" class="text-danger text-decoration-none d-inline-block me-3">cancella</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
</div>
@endsection