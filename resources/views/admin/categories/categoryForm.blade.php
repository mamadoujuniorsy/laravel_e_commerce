@extends('admin.adminLayout')
@section('title', $category->exists ? "Modifier categorie" : "Ajouter categorie")

@section('content')
<h1>@yield('title')</h1>
<form class="vstack gap-2" action="{{ route($category->exists ? 'admin.category.update' :
   'admin.category.store', $category)}}" method="post">

   @csrf
@method($category->exists ? 'put' : 'post')
  <div>
    <div class="row">
      @include('shared.input',['name' =>'category_name', 'label' =>'Nom de la categorie','value'=>$category->category_name])
    </div>
    <button class="btn btn-primary">
      @if($category->exists)
        Modifier
      @else
        créer  
      @endif  
    </button>
  </div>
 
</form>

@endsection