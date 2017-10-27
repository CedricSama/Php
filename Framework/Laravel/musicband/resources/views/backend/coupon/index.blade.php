@extends('backend')
@section('content')
    <div class="container">
        <h1 class="page-header">Coupons Dashboard</h1>
        @if(session('message_success'))
            <div class="alert alert-success">
                {{session('message_success')}}
            </div>
        @endif
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading text-center"><b>Coupons en ligne</b></div>
            <div class="panel-body">
                <!-- Table -->
                <table class="table">
                    <thead style="padding: auto">
                    <tr>
                        <th class="text-center">Coupon</th>
                        <th class="text-center">Valeur</th>
                        <th class="text-center">Conditions d'activations</th>
                        <th class="text-center"><a href="{{route('backend_coupon_create')}}" class="btn btn-success"
                                                   style="margin-top: 5px">Add</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr class="text-center " style="padding: 20px">
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}}</td>
                            <td>
                                <a href="{{route('backend_coupon_edit', ['id'=>$coupon->id])}}" class="btn btn-info" style="margin-top: 5px">Update</a>
                                <a href="{{route('backend_coupon_destroy', ['id'=>$coupon->id])}}" class="btn btn-danger" style="margin-top: 5px"
                                   onclick="return confirm('Sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container -->
@endsection