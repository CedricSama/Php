@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Products Dashboard</h1>
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Produits en ligne</b></div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Prix ht</th>
                        <th class="text-center"><a href="" class="btn btn-success" style="margin-top: 5px">Add</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="text-center " style="padding: 20px">
                            <td>{{$product->nom}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img src="{{asset('img/'.$product->photo)}}" alt="{{$product->photo}}" style="height: 15%">
                            </td><!--img-->
                            <td>{{$product->prix_ht}}</td>
                            <td>
                                <a href="" class="btn btn-info" style="margin-top: 5px">Update</a>
                                <a href="" class="btn btn-danger" style="margin-top: 5px">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection