<?php

namespace App\Http\Controllers\Backend;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    // Voir les coupons
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index',compact('coupons'));
    }

    // Créer un nouveau coupon
    public function create() {
        return view('backend.coupon.createOrEdit');
    }
    public function store(Request $request) {
        $this->validate(\request(),
            [
                'code'=>"required | unique:coupons",
                'value'=>"required",
            ]);
        $coupon = new Coupon();
        $coupon->fill($request->all());
        $coupon->save();
        return redirect()->to(route('coupon_index'))->with('message_success','le coupon est créé');

    }
    // Modifier un coupon
    public function edit($id_coupon) {
        $coupon = Coupon::find($id_coupon);
        return view('backend.coupon.createOrEdit',compact('coupon'));
    }

    public function update($id_coupon,Request $request) {
        $coupon = Coupon::find($id_coupon);
        $this->validate(\request(),
            [
                'code'=>"required",
                'value'=>"required",
            ]);
        $coupon->fill($request->all());
        $coupon->save();
        return redirect()->to(route('coupon_index'))->with('message_success','le coupon est modifié');
    }
    // Supprimer un coupon

    public function destroy($id_coupon) {
        Coupon::destroy($id_coupon);
        return redirect()->to(route('coupon_index'))->with('message_success','le coupon est supprimé');
    }
}
