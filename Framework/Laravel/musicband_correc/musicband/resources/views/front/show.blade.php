@extends('front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('uploads/'.$product->photo)}}" alt="{{$product->nom}}" class="img img-thumbnail">
        </div>
        <div class="col-md-6">
            <h1>{{$product->nom}}</h1>
            @if(null ==! $product->category)
                <h4>Catégorie: {{$product->category->nom}}</h4>
            @endif
            <h2>{{$product->prixTTC()}} €</h2>
            <p>{{$product->description}}</p>
            <form action="{{route('panier_add')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <select class="form-control" name="qte" id="qte">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <input type="submit" value="ajouter au panier" class="btn btn-lg btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection