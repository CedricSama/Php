@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Commandes Dashboard</h1>
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Liste des commandes</b></div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Date de création</th>
                        <th class="text-center">Nom du client</th>
                        <th class="text-center">Total TTC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commandes as $commande)
                        <tr class="text-center " style="padding: 20px">
                            <td>{{$commande->id}}</td>
                            <td>{{$commande->created_at}}</td>
                            <td>{{$commande->civilite}}  {{$commande->prenom}} {{$commande->nom}}</td>
                            <td>@if($commande->remise_value != null)
                                    {{$commande->prix_total_promo_ttc}} €<del>{{$commande->prix_total_ttc}} €</del>
                                @else
                                    {{$commande->prix_total_ttc}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection