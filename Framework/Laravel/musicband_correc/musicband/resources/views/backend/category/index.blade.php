@extends ("backend")

@section('content')
    <h1>Catégories</h1>

        <a class="pull-right btn btn-default" style="margin-bottom: 15px;" href="{{route('backend_category_create')}}">Ajouter une catégorie</a>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->nom}}</td>
                <td>{{$category->description}}</td>
                <td>
<a href="{{route('backend_category_edit',['id'=>$category->id])}}" class="btn btn-xs btn-primary">Modifier</a>
                    <a href="{{route('backend_category_destroy',['id'=>$category->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('sans regret ?')">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection