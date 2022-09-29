@extends('layouts.app')

@section('content')
<h2 class="text-center mt-2">Form per modifica tag</h2>
<div class="col-4 mx-auto p-3 mt-3 mb-2 bg-dark">
    <form action="{{ route('admin.tags.update',$tag->id) }}" method="POST">
        @csrf
        @method('PUT'); {{-- Non esistendo il metodo put nel form,dobbiamo inserirlo noi  --}}
        @include('admin.tags.forms.form');
      </form>
</div>
@endsection