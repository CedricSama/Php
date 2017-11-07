@extends('backend')
@section('content')
    @if(isset($coupon))
        <h1>Modifier le coupon {{$coupon->code}}</h1>
    @else
        <h1>Créer un nouveau coupon</h1>

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
    @if(isset($coupon))
        <form action="{{route('coupon_update',['id'=>$coupon->id])}}" method="POST">
    @else
        <form action="{{route('coupon_store')}}" method="POST">
        @endif

        {{csrf_field()}}
        <div class="form-group">
            <label for="code">Code du coupon</label>
            <input class="form-control" type="text" name="code" id="code" value="{{$coupon->code or old('code')}}">
        </div>
        <div class="form-group">
            <label for="value">Valeur de la remise</label>
            <input class="form-control" type="text" name="value" id="value" value="{{$coupon->value or old('value')}}">
        </div>
        <input type="submit" value="valider le coupon">
    </form>
@endsection