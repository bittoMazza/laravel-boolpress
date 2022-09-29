@extends('layouts.app')

@section('content')
<h2 class="text-center mt-2">Form per creazione tag</h2>
<div class="col-4 mx-auto p-3 mt-3 mb-2 bg-dark">
    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        @method('POST'); 
        @include('admin.tags.forms.form');
      </form>
</div>
@endsection