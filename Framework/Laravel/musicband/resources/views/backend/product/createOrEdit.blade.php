@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Products Dashboard</h1>
        <!-- Default panel contents -->
        <div class="panel-heading col-md-9"><h2><b>Ajouter un produit</b></h2>
            @if(session('message_success'))
                <div class="alert alert-success">
                    {{session('message_success')}}
                </div>
            @endif
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset($product))
                <form action="{{route('backend_product_update', ['id'=>$product->id])}}" method="post"
                      enctype="multipart/form-data">
                    @else
                        <form action="{{route('backend_product_store')}}" method="post" enctype="multipart/form-data">
                            @endif
                            {{--Attention le ENCTYPE est toujours le meme et est HYPERIMPORTANT--}}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nom">Nom du produit</label>
                                <input type="text" name="nom" id="nom" class="form-control"
                                       value="{{$product->nom or old('nom')}}">
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <label for="category_id">Choix de la catégorie</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Aucune catégorie</option>
                                        @foreach($categories as $category)
                                            <option @if(isset($product->category_id) && $product->category_id == $category->id)
                                                    selected @endif
                                                    value="{{$category->id}}">{{$category->nom}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prix_ht">Prix HT</label>
                                <input type="text" name="prix_ht" id="prix_ht" class="form-control"
                                       value="{{$product->prix_ht or old('prix_ht')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          rows="10">{{$product->description or old('description')}}</textarea>
                            </div>
                            @if(isset($product))
                                <div class="col-xs-4">
                                    <img src="{{asset('uploads/'.$product->photo)}}"
                                         alt="{{asset('uploads/'.$product->photo)}}" class=" img img-circle"
                                         width="100">
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="photo">Photo du produit</label>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right" value="valider">
                            </div>
                        </form>
        </div>
    </div><!-- /.container -->
@endsection