@extends('front')
@section('content')
    <div class="container">
        <div class="starter-template">
            <div class="row">
                <a href="{{route('liste_tshirt')}}"><h1>Music Band</h1></a>
                <h2>Salut c'est la vue T-shirt !</h2>
            </div>
            <div class="row" style="margin-top:35px">
                <div class="col-md-6">
                    <div class="img-thumbnail">
                        <img src="{{asset('uploads/'.$product->photo)}}"
                             alt="{{$product->nom}}"
                             title="{{$product->nom}}">
                    </div>
                </div>
                <div class="col-md-6 caption">
                    <h2>{{$product->nom}}</h2>
                    @if($product->category ==! null)
                        <h4>Catégorie : {{$product->category->nom}}</h4>
                    @endif
                    <h3 style="font-weight: 700">{{$product->prixTTC()}} €</h3>
                    <p>{{$product->description}}</p>
                    <div class="text-center">
                    {{--Astuce pour formulaire d'envoie d'ajout dans le panier (form avec input hidden)--}}
                    <form action="{{route('panier_add')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <select title="qte" name="qte" id="qte" class="form-control">
                                    @for ($i=1; $i<=10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Ajouter au Panier">
                    </form>
                    </div>
                    <p><a href="{{route('liste_tshirt')}}"
                          class="btn btn-default"
                          role="button">Retour aux goodies</a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection