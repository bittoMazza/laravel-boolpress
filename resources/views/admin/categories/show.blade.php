@extends('layouts.app')


@section('content')
    <div class="container text-center mt-3">
        <h2 style="background-color: ">{{ $category->name }}</h2>
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>immagine</th>
                <th>Data Post</th>
                <th>Contenuto Post</th>
                <th>Categoria</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($category->posts as $post)
                    <tr>
                        <td><a href="{{ route('admin.posts.show',$post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->thumb }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>{{ $post->post_content }}</td>
                        @isset($post->category)
                        <td><a href="{{ route('admin.categories.show',$post->category->id) }}" class="p-1 rounded text-white" style="background-color:{{ $post->category->color }} ">{{ $post->category->name }}</a></td>
                        @endisset
                       
                        <td>
                          <div class="d-flex">
                            <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-warning me-2">Edit</a>
                            <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST" class="delete-comic-form">
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