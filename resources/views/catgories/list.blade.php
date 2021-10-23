@extends('layout')

@section('content')
    <div class="container">
        <h1>Les catégories</h1>

        <ul>
            @foreach($categories as $category)
                <li>
                    <form method="post" action="{{route('categoryUpdate', $category->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="name" required class="form-control" value="{{$category->name}}">
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
                    </form>

                    <form method="post" action="{{route('categoryDelete', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="{{route('categoryAdd')}}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>
@endsection
