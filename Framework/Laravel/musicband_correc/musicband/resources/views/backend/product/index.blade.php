@extends('backend')

@section('content')
    <h1>Produits</h1>

    <a class="pull-right btn btn-default" style="margin-bottom: 15px;" href="{{route('backend_product_create')}}">Ajouter un produit</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Nom du produit</th>
            <th>Prix HT</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td><img width="100" src="{{asset('uploads/'.$product->photo)}}"></td>
                <td>{{$product->nom}}</td>
                <td>{{number_format($product->prix_ht,2)}} €</td>
                <td>
                    <a class="btn btn-xs btn-primary" href="{{route('backend_product_edit',['id'=>$product->id])}}">Modifier</a>
                    <a class="btn btn-xs btn-danger" href="{{route('backend_product_destroy',['id'=>$product->id])}}" onclick="return confirm('Sans regret ?')">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection