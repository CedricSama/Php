@extends('order')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @if($panier_vide == false)
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Nom du produit</th>
                <th>P.U TTC</th>
                <th>Qte</th>
                <th>Total TTC</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img width="50" src="{{asset('uploads/'.$product->attributes['photo'])}}" alt=""></td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price,2)}} €</td>
                    <td>
                        <form action="{{route('panier_update_qte')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="text" name="qte" value="{{$product->quantity}}">
                            <input type="submit" value="actualiser" class="btn btn-xs">
                        </form>
<a class="btn btn-xs pull-right btn-danger" onclick="return (confirm('vraiment ?!'))" href="{{route('panier_delete_product',['id'=>$product->id])}}">Supprimer</a>
                    </td>
                    {{--{{number_format()}}--}}
                    <td>{{number_format($product->price * $product->quantity,2)}} € </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Sous-Total:</td>
                <td>
                    {{number_format($sous_total,2)}} €
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Remise:</td>
                <td>
                    @foreach($remises as $remise)
                        code:{{$remise->getName()}} valeur:{{$remise->getValue()}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td>
                    {{number_format($total,2)}} €
                </td>
            </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-xs-8">
                <h1>Un coupon de réduction ?</h1>
            </div>
            <div class="col-xs-4">
                {{--Affichage des messages succès ou erreur--}}
                <form action="{{route('panier_check_coupon')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="code" class="form-control">
                    </div>
                    <input type="submit" value="Appliquer">
                </form>
            </div>
            {{--// Etapes pour la partie coupon--}}
            {{--1 > Créer une table coupon avec 2 attributs > code (le code à saisir) et value--}}
            {{--php artisan make:model Coupon -m--}}
            {{-->> créer dans le fichier de migration deux champs : string code string value--}}
            {{--2 > Créer un CRUD dans le backend pour les coupons--}}
            {{--3 > Lorsque un coupon est appliqué, c'est à dire quand le formulaire est validé, on appelle une action dans un controller qui va vérifier si le coupon existe > oui / non--}}
            {{--4 > Si oui > on récupère la valeur du coupon et applique une cart condition au panier avec la valeur du coupon--}}
            {{--5 > Si non > message erreur coupon non valide--}}
            {{--6> si coupon déjà appliqué, on l'applique pas de nouveau--}}
            {{--7> Dans tous les cas, on redirige vers le panier--}}
            @else
                <h1>Votre panier est malheureusement vide ...</h1>
            @endif
            <a href="{{route('commande')}}" class="btn btn-lg btn-primary pull-right">Commander</a>
        </div>

    </div>
@endsection