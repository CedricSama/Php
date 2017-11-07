@extends('backend')

@section('content')
    <h1>Ajouter un produit</h1>
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
        <form action="{{route('backend_product_update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
        @else
        <form action="{{route('backend_product_store')}}" method="POST" enctype="multipart/form-data">
     @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="nom">Nom du produit</label>
            <input type="text" name="nom" id="nom" value="{{ $product->nom or old('nom') }}" class="form-control">
        </div>
            <div class="form-group">
                <select class="form-control" name="category_id" id="category_id">
                    <option value="" >aucune catégorie</option>
                    @foreach($categories as $category)
    <option @if(isset($product) && $product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->nom}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <label for="prix_ht">Prix HT</label>
            <input type="text" name="prix_ht" id="prix_ht"
                   value="{{ $product->prix_ht or old('prix_ht') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$product->description or old('description')}}</textarea>
        </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="photo">Photo du produit</label>
                    <input type="file" name="photo" id="photo">
                </div>
            </div>
            @if(isset($product))
            <div class="col-xs-6">
      <img src="{{asset('uploads/'.$product->photo)}}" class="img img-circle" width="100" alt="">
            </div>
            @endif

        <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right" value="valider">
        </div>
    </form>

@endsection