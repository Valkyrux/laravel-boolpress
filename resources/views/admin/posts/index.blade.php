@extends('layouts.app')

@section('content')
<div class="mb-2"><a href="{{route('admin.posts.create')}}" class="text-decoration-none fs-5"><i class="bi bi-plus-square"></i> Pubblica un Post</a></div>
    @foreach ($posts as $post)
        <div class="card post-block mb-4 {{($post->user_id == Auth::id())?'border-primary':''}}">
            <div class="card-header"><h5>{{ $post->title }}</h5></div>
            @if(!empty($post->image))
                <div class="w-100 text-center mt-3 mb-3"><img class="w-50" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}"></div>
            @endif
            <div class="card-body">
                <small class="text-primary text-uppercase"><a class="text-decoration-none" href="{{route('admin.categories.show', $post->category)}}">{{$post->category->name}}</a></small>
                @if(!empty($post->tags))
                    <div>
                        @foreach($post->tags as $tag)
                            <small class="text-secondary text-lowercase">#{{$tag->name}}</small>
                        @endforeach
                    </div>
                @endif
                <small class="text-primary text-lowercase"></small>
                <p class="mt-3">{{$post->content}}</p>
                <div class="text-end">
                    <small class="form-text">{{date_format($post->created_at, 'd/m/Y H:i')}}</small>
                </div>
                <div class="action-box">
                    <a href="{{route('admin.posts.show', $post)}}" class="text-secondary text-decoration-none d-inline-block me-3">dettagli</a>
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
    @endforeach
    {{$posts->links()}}
</div>
@endsection