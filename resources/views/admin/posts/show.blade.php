@extends('layouts.app')

@section('content')

<div class="mb-3"><a href="{{route('admin.posts.create')}}" class="text-decoration-none fs-5"><i class="bi bi-plus-square"></i> Pubblica un Post</a></div>
<div class="card mb-3 {{($post->user_id == Auth::id())?'border-primary':''}}">
    <div class="card-header"><h5>{{ $post->title }}</h5></div>
    <div class="card-body">
        <small class="text-primary"><span class="text-secondary">categoria: </span><a class=" text-decoration-none" href="{{route('admin.categories.show', $post->category)}}">{{$post->category->name}}</a></small>
        @if(!empty($post->tags))
                    <div>
                        @foreach($post->tags as $tag)
                            <small class="text-secondary text-lowercase">#{{$tag->name}}</small>
                        @endforeach
                    </div>
                @endif
        <p class="mt-3">{{$post->content}}</p>
        <div class="text-end">
            <small class="form-text">creato: {{date_format($post->created_at, 'd/m/Y H:i')}}</small> 
            <br>
            <small class="form-text">aggiornato: {{date_format($post->updated_at, 'd/m/Y H:i')}}</small>
        </div>
        <div>
        <a href="{{url()->previous()}}" class="text-info text-decoration-none d-inline-block me-3"><i class="bi bi-arrow-left-square"></i> indietro</a>
        @if($post->user_id == Auth::id())
            <a href="{{route('admin.posts.edit', $post)}}" class="text-decoration-none d-inline-block me-3">modifica</a>
            <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="d-inline-block">
                 @csrf
                 @method('DELETE')
                 <input type="submit" value="cancella" class="text-danger text-decoration-none d-inline-block border-0 me-3 bg-body">
            </form>
        @endif
        </div>
    </div>
</div>
@endsection