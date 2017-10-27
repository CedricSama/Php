@extends('order')
@section('content')
    <div class="container">
        @if(session('message_error'))
            <div class="alert alert-danger">
                {{session('message_error')}}
            </div>
        @endif
        @if(session('message_success'))
            <div class="alert alert-success">
                {{session('message_success')}}
            </div>
        @endif
        @if($panier_vide == false)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Nom du produit</th>
                    <th>Prix Unitaire TTC</th>
                    <th>Qte</th>
                    <th>Total TTC</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{route('voir_tshirt', ['id'=>$product->id])}}"><img width="50"
                                 src="{{asset('uploads/'.$product->attributes['photo'])}}"
                                 alt=""></a></td>
                        <td><a href="{{route('voir_tshirt', ['id'=>$product->id])}}">{{$product->name}}</a></td>
                        <td>{{number_format($product->price, 2)}}</td>
                        <td>
                            <form action="{{route('panier_qte_update')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden"
                                       name="product_id"
                                       value="{{$product->id}}">
                                <input type="text"
                                       width="20"
                                       title="qte" name="qte"
                                       value="{{$product->quantity}}">
                                <input type="submit"
                                       value="actualiser"
                                       class="btn btn-info btn-xs pull-right">
                            </form>
                            <a href="{{route('panier_delete_product', ['id'=>$product->id])}}"
                               class="btn btn-danger btn-xs pull-right"
                               onclick="return confirm('Vraiment ?')">Supprimer</a>
                        </td>
                        <td>{{number_format($product->price * $product->quantity, 2)}} €</td>
                    </tr>
                @endforeach
                <tr>
                <td colspan="4"  class="text-right">Sous-total :</td>
                <td>{{number_format($sous_total, 2)}} €</td>
                    </tr>
                @if(isset($remises) && count($panier_remises) >0)
                    <tr>
                        <td colspan="4" class="text-right">Remise :</td>
                        <td>@foreach($remises as $remise){{$remise->getName()}}  {{$remise->getValue()}}@endforeach</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="4"  class="text-right">Total :</td>
                    <td>{{number_format($total, 2)}} €</td>
                </tr>
                </tbody>
            </table>
            <div class="raw">
                <div class="col-xs-8">
                    <h3>Un coupon de rédution ?</h3>
                </div>
                <div class="col-xs-4">
                    <form action="{{route('panier_check_coupon')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="coupon" class="form-control" title="coupon">
                        </div>
                        <input type="submit" value="Appliquer">
                    </form>
                </div>
            </div>
                <a href="{{route('order')}}" class="btn btn-lg btn-primary pull-right" style="margin-top: 20px">Commander</a>
        @else
            <a href="{{route('liste_tshirt')}}" class="text-center"><h1>Votre Panier est vide !</h1></a>
        @endif
        
    </div>
@endsection