@extends('admin.adminLayout')
@section('title', 'Tous nos biens')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1>@yield('title')</h1>
  <a href="{{route('admin.product.create')}}" class="btn btn-primary">Ajouter un produit</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix</th>
      <th>Quantité</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{ $product->price }} Francs</td>
        <td>{{$product->stock_quantity}}</td>
        <td>
          <div class="flex.gap-2.w100 justify-content-end">
            <a href="{{route('admin.product.edit', $product)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('admin.product.destroy', $product)}}" method="post">
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
{{$products->links()}}
@endsection