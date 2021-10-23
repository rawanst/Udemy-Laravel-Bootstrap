 @extends('layout')

 @section('content')

     <div class="container">

         @if($errors->any())
             <ul class="alert alert-danger" style="list-style-type: none;">
                 @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                 @endforeach
             </ul>
         @endif

         <form method="post" action="{{route('register')}}">
            @csrf
             <div class="form-group">
                 <label>Prénom</label>
                 <input type="text" class="form-control" required name="firstname">
             </div>

             <div class="form-group">
                 <label>Nom</label>
                 <input type="text" class="form-control" required name="lastname">
             </div>

             <div class="form-group">
                 <label>Email</label>
                 <input type="email" class="form-control" required name="email">
             </div>

             <div class="form-group">
                 <label>Mot de passe</label>
                 <input type="password" class="form-control" required name="password">
             </div>

             <div class="form-group">
                 <label>Confirmation du mot de passe</label>
                 <input type="password" class="form-control" required name="password_confirmation">
             </div>

             <button type="submit" class="btn btn-primary">Inscription</button>
         </form>
     </div>
 @endsection



{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
