@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Commandes Dashboard</h1>
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Commandes n° {{$commande->id}}</b></div>
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="well">
                        <h5>Client</h5>
                        <address>
                            {{$commande->civilite}}  {{$commande->prenom}} {{$commande->nom}} <br>
                            {{$commande->adresse}} <br>
                            {{$commande->ville}} {{$commande->code_postal}} {{$commande->pays}} <br>
                            {{$commande->telephone}} <br>
                            @: {{$commande->email}}
                        </address>
                        <strong>
                            Date de la commande : <br>
                            {{\Carbon\Carbon::parse($commande->created_at)->format('d-m-Y H:i')}}
                        </strong>
                    </div>
                </div>
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Produit(s)</th>
                        <th class="text-center">Prix Unitaire</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody style="padding: auto">
                    <td class="text-center">{{$commande->id}}</td>
                    @foreach($commande->produits as $product)
                        <td class="text-center">{{$product->pivot->nom}}</td>
                        <td class="text-center">{{number_format($product->pivot->prix_unit_ttc, 2)}} €</td>
                        <td class="text-center">{{$product->pivot->quantity}}</td>
                        <td class="text-center">{{number_format($product->pivot->prix_total_ttc, 2)}} €</td>
                    @endforeach
                    @if(empty($commande->remise_name))
                        <tr>
                            <td colspan="4" class="text-right">Total HT</td>
                            <td class="text-center">{{number_format($commande->prix_total_ht, 2)}} €</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">TVA 20%</td>
                            <td class="text-center">{{number_format($commande->prix_total_ttc - $commande->prix_total_ht, 2)}} €</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Total TTC</td>
                            <td class="text-center">{{number_format($commande->prix_total_ttc, 2)}}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="4" class="text-right">Nom de la remise</td>
                            <td class="text-center">{{$commande->remise_name}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Total TTC avant remise</td>
                            <td class="text-center">{{number_format($commande->prix_total_ttc, 2)}} €</td>
                        </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total HT avec remise</td>
                        <td class="text-center">{{number_format($commande->prix_total_promo_ht, 2)}} €</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total TTC avec remise</td>
                        <td class="text-center">{{number_format($commande->prix_total_promo_ttc, 2)}} €</td>
                    </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection