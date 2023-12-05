@extends('admin.adminLayout')

@section('title', $user->exists ? "Modifier un utilisateur" : "Ajouter un utilisateur")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', $user)}}" method="post">

        @csrf
        @method($user->exists ? 'put' : 'post')

        <div class="row">

            @include('shared.input', ['name' =>'name', 'label' =>'Nom complet', 'value' => $user->name])
            @include('shared.input', ['name' =>'email', 'label' =>'email de l\'utilisateur', 'value' => $user->email])

        </div>

        <button class="btn btn-primary">

            @if($user->exists)

                Modifier

            @else

                Créer

            @endif

        </button>

    </form>

@endsection
