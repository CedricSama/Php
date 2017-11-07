@extends ("backend")

@section('content')
    <h1>Coupons de réduction</h1>
    <a class="btn btn-primary btn-xs pull-right" href="{{route('coupon_create')}}">Nouveau coupon</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Code</th>
            <th>Value</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td>{{$coupon->code}}</td>
                <td>{{$coupon->value}}</td>
                <td><a href="{{route('coupon_edit',['id'=>$coupon->id])}}" class="btn-xs btn-default">Modifier</a>
                    <a href="{{route('coupon_destroy',['id'=>$coupon->id])}}" class="btn-xs btn-danger" onclick="return(confirm('sans regret ?'))">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection