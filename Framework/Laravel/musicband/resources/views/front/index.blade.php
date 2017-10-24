@extends('front')
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Bienvenue sur Music Band</h1>
            <h2>Achetez nos goodies !</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="{{route('voir_tshirt', ['id'=>$product->id])}}"><img src="{{asset('uploads/'.$product->photo)}}"
                                 alt="{{$product->nom}}"
                                 title="{{$product->nom}}"></a>
                            <div class="caption">
                                <h3>{{$product->nom}}</h3>
                                <p>{{$product->description}}</p>
                                <p>
                                    <a href="{{route('voir_tshirt', ['id'=>$product->id])}}"
                                       class="btn btn-primary"
                                       role="button">Voir</a>
                                    <a href="#"
                                       class="btn btn-default"
                                       role="button">Panier</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- /.container -->
@endsection