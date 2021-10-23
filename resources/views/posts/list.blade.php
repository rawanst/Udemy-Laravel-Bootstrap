@extends('layout')

@section('content')

     @include('components.banner', ['title' => 'Bannière liste des articles'])

     @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('postAdd')}}" class="btn btn-primary">Ajouter un article</a>
     @endif

     <h1>La liste des articles:</h1>
    <div class="row">
        @if(sizeof($posts) > 0)
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("storage/$post->picture")}}"
                             style="object-fit: cover" height="200">
                        <div class="card-body">
                            <h5>{{$post->title}}</h5>
                            <p>{{$post->extrait}}</p>
                            <p>{{$post->countComments()}} commentaire(s)</p>
                            @if(!empty($post->user->firstname))
                                <p>Ecrit par {{$post->user->firstname}} {{$post->user->lastname}}</p>
                            @endif
                            <div>
                                @foreach($post->categories as $category)
                                    <span>{{$category->name}}</span>
                                @endforeach
                            </div>
                            <div class="d-flex">
                                <a href="{{route('postDetails', $post->id)}}" class="btn btn-primary">Détails</a>
                                <form method="post" action="{{route('postDelete',$post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Il n'y a aucun article.</p>
        @endif
    </div>


    {{--}}<ul>
        @if(sizeof($posts) > 0)
            @foreach($posts as $post)
                <li>
                    <h2><a href="{{route('postDetails', $post->id)}}">{{$post->title}}</a></h2>
                    <p>{{$post->extrait}}</p>
                </li>
            @endforeach
        @else
            <p>Il n'y a aucun article.</p>
        @endif
    </ul>--}}
@endsection
