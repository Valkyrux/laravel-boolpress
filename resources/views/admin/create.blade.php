@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <form action="{{route('admin.store')}}" method="POST"> --}}
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="content">A cosa stai pensando?</label>
                  <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Pubblica</button>
              </form>
        </div>
    </div>
</div>
@endsection