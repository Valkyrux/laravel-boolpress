@extends('layouts.app')

@section('content')
<form action="{{route('admin.posts.update', $post)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group mb-3">
    <div class="form-group mb-3">
      <label for="category_id">Seleziona una Categoria</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
          <option value="{{$category->id}}" {{($post->category_id == $category->id) ? 'selected' : ''}} class="text-capitalize">{{$category->name}}</option> 
        @endforeach
      </select>
      @error('category_id')
        <div class="alert alert-danger pt-1 pb-1">
          {{$message}}
        </div>    
       @enderror
    </div>

    <div class="form-group mb-3">
      <label for="tags">Seleziona i tag</label>
        @foreach ($tags as $tag)
          @if(empty(old('tags'))) 
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]" {{$post->tags->contains($tag->id) ?'checked':''}}> 
              <label class="form-check-label" for="tags">
                {{$tag->name}}
              </label>
            </div>
          @else
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]" {{in_array($tag->id, old('tags', []))?'checked':''}}> 
              <label class="form-check-label" for="tags">
                {{$tag->name}}
              </label>
            </div>
          @endif
        @endforeach
      @error('tags[]')
        <div class="alert alert-danger pt-1 pb-1">
          {{$message}}
        </div>    
      @enderror
    </div>

    <label for="title">Modifica Titolo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $post->title}}">
    @error('title')
      <div class="alert alert-danger pt-1 pb-1">
        {{$message}}
      </div>    
    @enderror
  </div>
  <div class="form-group mb-3">
    <label for="content">Modifica contenuto</label>
    <textarea class="form-control" id="content" name="content">{{old('content') ? old('content') : $post->content}}</textarea>
    @error('content')
      <div class="alert alert-danger pt-1 pb-1">
        {{$message}}
      </div>    
    @enderror
  </div>
  <button type="submit" class="btn btn-success text-light">Aggiorna</button>
</form>
@endsection