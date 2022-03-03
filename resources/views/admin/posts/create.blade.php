@extends('layouts.app')

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST">
  @csrf
  @method('POST')
  <div class="form-group mb-3">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group mb-3">
    <label for="content">A cosa stai pensando?</label>
    <textarea class="form-control" id="content" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-success text-light">Pubblica</button>
</form>
@endsection