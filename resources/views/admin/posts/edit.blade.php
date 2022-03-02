@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.adminDashboard')
        <div class="col-md-8">
            <form action="{{route('admin.posts.update', $post)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                  @error('title')
                    <div class="alert alert-danger pt-1 pb-1">
                        {{$message}}
                    </div>    
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="content">A cosa stai pensando?</label>
                  <textarea class="form-control" id="content" name="content">{{$post->content}}</textarea>
                  @error('content')
                    <div class="alert alert-danger pt-1 pb-1">
                        {{$message}}
                    </div>    
                  @enderror
                </div>
                <button type="submit" class="btn btn-success text-light">Aggiorna</button>
              </form>
        </div>
    </div>
</div>
@endsection