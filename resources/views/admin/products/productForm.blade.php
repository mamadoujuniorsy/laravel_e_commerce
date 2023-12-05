@extends('admin.adminLayout')
@section('title', $product->exists ? "Modifier produit" : "Ajouter produit")

@section('content')
<h1>@yield('title')</h1>
<form class="vstack gap-2" action="{{ route($product->exists ? 'admin.product.update' :
   'admin.product.store', $product)}}" method="post">

   @csrf
@method($product->exists ? 'put' : 'post')
  <div>
    <div class="row">
      <div class="col row">
      @include('shared.input',['name' =>'name', 'label' =>'Nom du produit','value'=>$product->name])
      @include('shared.input',['name' =>'price', 'label' =>'prix du produit','value'=>$product->price])
      </div>
      @include('shared.input',['name' =>'stock_quantity', 'label' =>'Quantité de stocks','value'=>$product->stock_quantity])
      @include('shared.input',['type' =>'textarea','name' =>'description', 'label' =>'Description du produit','value'=>$product->description])
    </div>
    <button class="btn btn-primary">
      @if($product->exists)
        Modifier
      @else
        créer  
      @endif  
    </button>
  </div>
 
</form>

@endsection