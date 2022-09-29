@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="p-3 text-center">Tutte le categorie </h2>
    <h3 class="text-center"> <-- Clicca sul nome della categoria per vedere i post relativi --> </h3>
    @if ( session('delete'))
      <div class="alert alert-warning m-3">
        {{ session('delete') }} è stato rimosso con successo
      </div>
    @endif

    @if ( session('update'))
      <div class="alert alert-success m-3">
        {{ session('update') }} è stato modificato con successo
      </div>
    @endif
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Colore</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a class="text-white" href="{{ route('admin.categories.show',$category->id) }}">{{ $category->name }}</a></td>
                    <td style="background-color: {{ $category->color }}">Colore categoria</td>
                    <td>
                      <div class="d-flex">
                        <a href="#" class="btn btn-warning me-2">Edit</a>
                        <form action="" method="POST" class="delete-comic-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection