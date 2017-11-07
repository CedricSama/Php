@extends('backend')
@section('content')
<h1>Commande N° {{$commande->id}}</h1>
<div class="col-md-4">
    <div class="well">
        <h4>Client</h4>
        <address>
            {{$commande->civilite}} {{$commande->prenom}} {{$commande->nom}} <br>
            {{$commande->adresse}} {{$commande->adresse2}} <br>
            {{$commande->ville}} {{$commande->code_postal}} {{$commande->pays}} <br>
            Tel:{{$commande->telephone}} @: {{ $commande->email }}
        </address>
        <Strong>Date de la commande:
            {{\Carbon\Carbon::parse($commande->created_at)->format('d-m-Y H:i')}}</Strong>
    </div>
</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Produit(s)</th>
            <th>P.U</th>
            <th>Qté</th>
            <th>Total TTC</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commande->produits as $produit)
            <tr>
                <td>{{$produit->nom}}</td>
                <td>{{number_format($produit->pivot->prix_unitaire_ttc,2)}} €</td>
                <td>{{$produit->pivot->qte}}</td>
                <td>{{number_format($produit->pivot->prix_total_ttc,2)}} €</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        @if(empty($commande->nom_remise_appliquee))
        <tr>
            <td colspan="3" class="text-right">Total HT:</td>
            <td>{{number_format($commande->prix_total_ht,2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">TVA 20%</td>
            <td>{{number_format($commande->prix_total_ttc - $commande->prix_total_ht,2)}} €</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">TOTAL TTC</td>
            <td>{{number_format($commande->prix_total_ttc,2)}} €</td>
        </tr>
        @else
        <tr>
            <td colspan="3" class="text-right">Remise {{$commande->nom_remise_appliquee}} </td>
            <td>{{$commande->montant_de_la_remise_appliquee}}</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Sous-Total TTC avant remise</td>
            <td>{{number_format($commande->prix_total_ttc,2)}} €</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Total HT</td>
            <td>{{number_format($commande->prix_total_promo_ht,2)}} €</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">TVA 20%</td>
            <td>{{$commande->prix_total_promo_ttc - $commande->prix_total_promo_ht}} €</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Total TTC</td>
            <td>{{number_format($commande->prix_total_promo_ttc,2)}} €</td>
        </tr>
@endif



        </tfoot>
    </table>
@endsection