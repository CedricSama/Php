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
                            <a href="{{route('voir_tshirt', ['id'=>$product->id])}}">
                            <img src="{{asset('uploads/'.$product->photo)}}"
                                 alt="{{$product->nom}}"
                                 title="{{$product->nom}}"></a>
                            <div class="caption">
                                <h3><a href="{{route('voir_tshirt', ['id'=>$product->id])}}">{{$product->nom}}</a></h3>
                                <p>{{$product->description}}</p>
                                    <a href="{{route('voir_tshirt', ['id'=>$product->id])}}"
                                       class="btn btn-primary"
                                       role="button">Voir</a>
                                <form action="{{route('panier_add_one')}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input type="hidden"
                                           name="product_id" value="{{$product->id}}">
                                    <input class="btn btn-default"
                                           type="submit" value="Panier">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!-- /.container -->
@endsection