
@extends('layouts.app')
<!-- se manda el contendio para yield con campo titulo en app,balde -->
@section('titulo')
Home
@endsection

@section('contenido')

@if($post->count())
    @foreach ($post as $pst )
  
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">  
                <a href="{{ route('post.show',[
                    'post' => $pst,
                    'user' => $pst->users_id,
                    ]) }}">
                    <img src="{{asset('uploads').'/'.$pst->imagen}}" alt="imagen {{ $pst->titulo }}">
                </a>
    </div>
        @endforeach
      

@else
    <p>
        Nada nuevo por aqui
    </p>
@endif


@endsection
