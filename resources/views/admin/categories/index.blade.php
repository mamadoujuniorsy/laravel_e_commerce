@extends('admin.adminLayout')
@section('title', 'Toutes nos catégories')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1>@yield('title')</h1>
  <a href="{{route('admin.category.create')}}" class="btn btn-primary">Ajouter une catégorie</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nom de la catégorie</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{$category->category_name}}</td>
        <td>
          <div class="d-flex justify-content-end ">
            <a href="{{route('admin.category.edit', $category)}}" class="btn btn-primary">Modifier</a>
            <form action="{{route('admin.category.destroy', $category)}}" method="post">
              @csrf 
              @method("delete")
              <button class="btn btn-danger mt-2 ml-2">Supprimer</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{$categories->links()}}
@endsection