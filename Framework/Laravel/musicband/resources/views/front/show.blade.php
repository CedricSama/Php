@extends('front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('uploads/'.$product->photo)}}"
                     alt="{{$product->nom}}"
                     title="{{$product->nom}}"
                class="img img-thumbnail">
            </div>
            <div class="col-md-6 text-center">
                <h2>{{$product->nom}}</h2>
                @if($product->category ==! null)
                    <h4>Catégorie : {{$product->category->nom}}</h4>
                @endif
                <h3 style="font-weight: 700">{{$product->prixTTC()}} €</h3>
                <p>{{$product->description}}</p>
                {{--Astuce pour formulaire d'envoie d'ajout dans le panier (form avec input hidden)--}}
                <form action="{{route('panier_add')}}"
                      method="post">
                    {{csrf_field()}}
                    <input type="hidden"
                           name="product_id" value="{{$product->id}}">
                    <div class="row ">
                        <div class="form-group col-xs-6 center-block"
                             align="center" style="margin-left: 24%">
                            <select title="qte"
                                    name="qte" id="qte"
                                    class="form-control">
                                @for ($i=1; $i<=10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-success"
                           type="submit" value="Ajouter au Panier">
                </form>
                <p><a href="{{route('liste_tshirt')}}"
                             class="btn btn-default"
                             role="button"
                    style="margin-top: 10px">Retour aux goodies</a>
                </p>
            </div>
        </div>
        
    </div><!-- /.container -->
@endsection