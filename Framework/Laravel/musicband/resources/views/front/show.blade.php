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
                        <img src="{{asset('img/'.$product->photo)}}"
                             alt="{{$product->nom}}"
                             title="{{$product->nom}}">
                    </div>
                </div>
                <div class="col-md-6 caption">
                    <h2>{{$product->nom}}</h2>
                    <h3 style="font-weight: 700">{{number_format($product->prix_ht, 2)}} €</h3>
                    <p>{{$product->description}}</p>
                    <p>
                        <a href="#"
                           class="btn btn-success"
                           role="button">Ajouter au Panier</a>

                    </p>
                    <p><a href="{{route('liste_tshirt')}}"
                          class="btn btn-default"
                          role="button">Retour aux goodies</a>
                    </p>
                </div>


            </div>
        </div>
    </div><!-- /.container -->
@endsection