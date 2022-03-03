@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Categorie</th>
        <th scope="col">Post pubblicati</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th><a class="text-uppercase text-decoration-none" href="{{route('admin.categories.show', $category)}}">{{$category->name}}</a></th>
                <td>{{$counts[$category->id]}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection