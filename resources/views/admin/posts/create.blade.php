@extends('layouts.app')

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="form-group mb-3">
    <label for="category_id">Seleziona una Categoria</label>
    <select class="form-select" name="category_id">
      @foreach ($categories as $category)
        <option value="{{$category->id}}" class="text-capitalize">{{$category->name}}</option> 
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
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]" {{in_array($tag->id, old('tags', []))?'checked':''}}> 
        <label class="form-check-label" for="tags">
          {{$tag->name}}
        </label>
      </div>
      @endforeach
    @error('tags[]')
      <div class="alert alert-danger pt-1 pb-1">
        {{$message}}
      </div>    
    @enderror
  </div>
  <div class="form-group mb-3">
    <label for="title">Inserisci un titolo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
    @error('title')
      <div class="alert alert-danger pt-1 pb-1">
        {{$message}}
      </div>    
    @enderror
  </div>
  
  <div class="form-group mb-3">
    <label for="content">A cosa stai pensando?</label>
    <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
  </div>
  @error('content')
    <div class="alert alert-danger pt-1 pb-1">
      {{$message}}
    </div>    
  @enderror

  <div class="input-group mb-3">
    <label class="input-group-text" for="image">Carica</label>
    <input type="file" class="form-control" id="image-upload" name="image">
  </div>

  <button type="submit" class="btn btn-success text-light">Pubblica</button>
</form>
@endsection