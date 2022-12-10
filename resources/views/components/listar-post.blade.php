<div>
    @if($posts->count())
    @foreach ($posts as $pst )
  
    <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-6 gap-6">  
                <a href="{{ route('post.show',[
                    'post' => $pst,
                    'user' => $pst->users_id,
                    ]) }}">
                    <img src="{{asset('uploads').'/'.$pst->imagen}}" 
                    alt="imagen {{ $pst->titulo }}">
                </a>
    </div>
        @endforeach
        <div class="my-10" id="links">
            {{$posts->links()}}
    	</div>    

@else
    <p>
        Nada nuevo por aqui
    </p>
@endif

</div>