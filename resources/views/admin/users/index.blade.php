@extends('admin.adminLayout')
@section('title', 'Tous nos utilisateurs')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1>@yield('title')</h1>
  <a href="{{route('admin.user.create')}}" class="btn btn-primary mt-3">Ajouter un utilisateur</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nom_Complet</th>
      <th>Email</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{ $user->email }}</td>
        <td>
          <div class="flex-d justify-content-end">
            <a href="{{route('admin.user.edit', $user)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('admin.user.destroy', $user)}}" method="post">
              @csrf 
              @method("delete")
              <button class="btn btn-danger mt-2">Supprimer</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{$users->links()}}