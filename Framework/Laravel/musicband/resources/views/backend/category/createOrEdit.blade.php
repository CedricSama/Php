@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Categories Dashboard</h1>
        <!-- Default panel contents -->
        <div class="panel-heading col-md-9"><h2><b>Ajouter une Categorie</b></h2>
            @if(session('message_success'))
                <div class="alert alert-success">
                    {{session('message_success')}}
                </div>
            @endif
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset($category))
                <form action="{{route('backend_category_update', ['id'=>$category->id])}}" method="post"
                      enctype="multipart/form-data">
            @else
                <form action="{{route('backend_category_store')}}" method="post" enctype="multipart/form-data">
                    {{--Attention le ENCTYPE est toujours le meme et est HYPERIMPORTANT--}}
            @endif
                {{--CSRF Contre les attaques Cross-Site Request Forgery CSRF ou XSRF (appelé aussi sea-surfing thai--}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nom">Nom de la catégorie</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="{{$category->nom or old('nom')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description de la catégorie</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control"
                                  rows="10">{{$category->description or old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="valider">
                    </div>
                </form>
        </div>
    </div><!-- /.container -->
@endsection