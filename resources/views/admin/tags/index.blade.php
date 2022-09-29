@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="p-3 text-center">Tutti i tag </h2>
    <h3 class="text-center"> <-- Clicca sul nome del tag per vedere i post relativi --> </h3>
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
    <a  href="{{ route('admin.tags.create') }}" class="btn btn-info my-3">new tag</a>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td><a class="text-white" href="{{ route('admin.tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST" class="delete-comic-form">
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