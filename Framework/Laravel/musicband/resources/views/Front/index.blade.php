@extends('front')
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Bienvenue sur Music Band</h1>
            <h2>Achetez nos goodies !</h2>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/ramones.jpg" alt="Ramones">
                        <div class="caption">
                            <h3>T-Shirt Ramones</h3>
                            <p>Description</p>
                            <p><a href="#" class="btn btn-primary" role="button">Voir</a>
                                <a href="#"
                                   class="btn btn-default"
                                   role="button">Panier</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/pink-floyd.jpg" alt="Pink Floyd">
                        <div class="caption">
                            <h3>T-Shirt Pink Floyd</h3>
                            <p>Description</p>
                            <p><a href="#" class="btn btn-primary" role="button">Voir</a> <a href="#"
                                                                                             class="btn btn-default"
                                                                                             role="button">Panier</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/bowie.jpg" alt="David Bowie">
                        <div class="caption">
                            <h3>T-Shirt David Bowie</h3>
                            <p>Description</p>
                            <p><a href="#" class="btn btn-primary" role="button">Voir</a> <a href="#"
                                                                                             class="btn btn-default"
                                                                                             role="button">Panier</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection