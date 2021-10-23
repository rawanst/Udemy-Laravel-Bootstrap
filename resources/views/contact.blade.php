@extends('layout')

@section('content')
    <div class="container">
        <h1 class="md-5">Formulaire de contact</h1>
        <form method="post" action="{{route('send')}}">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Votre nom" required class="form-control" name="name">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Votre message" required class="form-control" name="message">
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Envoyer le message</button>
        </form>
    </div>

@endsection
