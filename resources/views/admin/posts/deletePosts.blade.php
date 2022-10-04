@extends('layouts.app')

@section('content')
<h2 class="text-center mt-2">titoli dei post eliminati</h2>
<div class="col-4 mx-auto p-3 mt-3 mb-2 bg-dark">
   @forelse ($posts as $post)
        <div class="text-white">
            {{ $post->title }}
        </div>
   @empty
       non sono stati eliminati post
   @endforelse
</div>
@endsection