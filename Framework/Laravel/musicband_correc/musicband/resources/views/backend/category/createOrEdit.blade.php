@extends('backend')
@section('content')
<h1>Créer une nouvelle catégorie</h1>
@if(isset($category))
    <form action="{{route('backend_category_update',['id'=>$category->id])}}" method="POST">
@else
    <form action="{{route('backend_category_store')}}" method="POST">
@endif
    {{csrf_field()}}
    <div class="form-group">
        <label for="nom">Nom de la catégorie</label>
        <input type="text" name="nom" id="nom" class="form-control" value="{{$category->nom or old('nom')}}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$category->description or old('description')}}</textarea>
    </div>
    <input type="submit" class="btn btn-primary">
</form>

@endsection