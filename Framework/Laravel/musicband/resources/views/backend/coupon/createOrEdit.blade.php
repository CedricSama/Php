@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Coupons Dashboard</h1>
        <!-- Default panel contents -->
        <div class="panel-heading col-md-9"><h2><b>Ajouter un Coupon de reduction</b></h2>
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(isset($coupon))
                <form action="{{route('backend_coupon_update', ['id'=>$coupon->id])}}" method="post">
            @else
                <form action="{{route('backend_coupon_store')}}" method="post">
                    {{--Attention le ENCTYPE est toujours le meme et est HYPERIMPORTANT pour telecharger des fichiers--}}
            @endif
                {{--CSRF Contre les attaques Cross-Site Request Forgery CSRF ou XSRF (appelé aussi sea-surfing thai--}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="code">Code Coupon</label>
                        <input type="text" name="code" id="code" class="form-control"
                               value="{{$coupon->code or old('code')}}">
                    </div>
                    <div class="form-group">
                        <label for="value">Valeur du Coupon</label>
                        <input type="text" name="value" id="value" class="form-control"
                               value="{{$coupon->value or old('value')}}">
                    </div>
                    <div class="form-group">
                        <label for="condition">Conditions d'activations</label>
                        <textarea name="condition"
                                  id="condition"
                                  class="form-control"
                                  rows="10">{{$coupon->condition or old('condition')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="valider">
                    </div>
                </form>
        </div>
    </div><!-- /.container -->
@endsection