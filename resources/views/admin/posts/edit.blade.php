@extends('layouts.app')

@section('content')
<h2 class="text-center mt-2">Form per modifica post</h2>
<div class="col-4 mx-auto p-3 mt-3 mb-2 bg-dark">
    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT'); {{-- Non esistendo il metodo put nel form,dobbiamo inserirlo noi  --}}
        @include('admin.posts.forms.form');
      </form>
</div>
@endsection