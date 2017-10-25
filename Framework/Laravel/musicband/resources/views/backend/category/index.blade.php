@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Categories Dashboard</h1>
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Produits en ligne</b></div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">Catégorie</th>
                        <th class="text-center">Déscription</th>
                        {{--<th class="text-center">Action</th>--}}
                        <th class="text-center"><a href="{{route('backend_category_create')}}" class="btn btn-success"
                                                   style="margin-top: 5px">Add</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="text-center " style="padding: 20px">
                            <td>{{$category->nom}}</td>
                            <td>{{$category->description}}</td>
                           {{-- <td class="text-center"><a href="{{route('backend_category_show', ['id'=>$category->nom])}}" class="btn btn-success"
                                                       style="margin-top: 5px">See all</a></td>--}}
                            <td>
                                <a href="{{route('backend_category_edit', ['id'=>$category->id])}}" class="btn btn-info" style="margin-top: 5px">Update</a>
                                <a href="{{route('backend_category_destroy', ['id'=>$category->id])}}" class="btn btn-danger" style="margin-top: 5px"
                                   onclick="return confirm('Sans regret?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection