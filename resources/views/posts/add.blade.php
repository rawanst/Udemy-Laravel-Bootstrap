@extends('layout')

@section('content')
    <div class="container">
        <h1>Ajouter un nouvelle article</h1>

        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{route('postStore')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Titre</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label>Extrait</label>
                <input type="text" class="form-control" name="extrait" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="picture" required accept="image/png, image/jpeg, image/jpg">
            </div>

            <label>Catégorie de l'article</label>
            <div>
                @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox"
                               class="form-check-input"
                               id="check-{{$category->id}}"
                               name="categories[]"
                               value="{{$category->id}}"
                        >
                        <label class="form-check-inline" for="check-{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection

