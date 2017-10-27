@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Products Dashboard</h1>
        @if(session('message_success'))
            <div class="alert alert-success">
                {{session('message_success')}}
            </div>
        @endif
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Produits en ligne</b></div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Catégorie</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Prix ht</th>
                        <th class="text-center">
                            <a href="{{route('backend_product_create')}}"
                               class="btn btn-success"
                               style="margin-top: 5px">Add
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="text-center " style="padding: 20px">
                            <td>{{$product->nom}}</td>
                            <td>@if(is_object($product->category)){{$product->category->nom}}@endif</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img src="{{asset('uploads/'.$product->photo)}}" alt="{{asset('uploads/'.$product->photo)}}"
                                     style="height: 100px">
                            </td><!--img-->
                            <td>{{$product->prixTTC()}}</td>
                            <td>
                                <a href="{{route('backend_product_edit', ['id'=>$product->id])}}"
                                   class="btn btn-info" style="margin-top: 5px">Update</a>
                                <a href="{{route('backend_product_delete', ['id'=>$product->id])}}"
                                   class="btn btn-danger"
                                   onclick="return confirm('Sans regret?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection