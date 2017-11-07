@extends('backend')
@section('content')
   <h1>Total: {{count($commandes)}}</h1>
   <h1>Total CA du mois: {{$total_ca_mois}} </h1>
   <h1>Total Commande du mois: {{$total_commandes_du_mois}} </h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Date de création</th>
        <th>Nom du client</th>
        <th>Total TTC</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($commandes as $commande)
        <tr>
            <td>{{$commande->id}}</td>
            <td>{{$commande->created_at}}</td>
            <td>{{$commande->civilite}} {{$commande->prenom}} {{$commande->nom}}</td>
            <td>@if($commande->montant_de_la_remise_appliquee != null)
                    {{$commande->prix_total_promo_ttc}} € <del>{{$commande->prix_total_ttc}} €</del>
                @else
                    {{$commande->prix_total_ttc}} €
                @endif
               </td>
            <td>
<a href="{{route('commande_show',['id'=>$commande->id])}}" class="btn btn-xs btn-default">Voir</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection