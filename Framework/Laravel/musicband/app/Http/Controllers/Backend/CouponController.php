<?php
    namespace App\Http\Controllers\Backend;
    use App\Coupon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class CouponController extends Controller{
        public function index(){
            $coupons = Coupon::all();
            return view('backend.coupon.index', compact('coupons'));
        }
        public function create(){
            return view('backend.coupon.createOrEdit');
        }
        public function store(Request $request){
            $validation = ['code' => 'required', 'value' => 'required'];
            $this->validate(\request(), $validation);
            $coupon = new Coupon();
            $coupon -> fill($request -> all());
            $coupon -> save();
            return redirect(route('backend_coupons'))-> with('message_success', 'Nouveau coupon ajouté.');
        }
        public function edit($id_coupon){
            $coupon = Coupon::find($id_coupon);
            return view('backend.coupon.createOrEdit', compact('coupon'));
        }
        public function update(Request $request, $id_coupon){
            $coupon = Coupon::find($id_coupon);
            $validation = ['code' => 'required', 'value' => 'required'];
            $this->validate(\request(), $validation);
            $coupon ->fill($request->all());
            $coupon ->save();
            return redirect(route('backend_coupons'))->with('message_success', 'Le coupon a bien été mise à jour.');
        }
        public function destroy($id_coupon){
            $coupon = Coupon::find($id_coupon);
            $coupon -> delete();
            return redirect(route('backend_coupons'))->with('message_success', 'Le coupon a été supprimé.');
        }
    /*$condition = new \Darryldecode\Cart\CartCondition(array(
    'name' => 'VAT 12.5%',
    'type' => 'tax',
    'target' => 'subtotal',
    'value' => '12.5%',
    'attributes' => array( // attributes field is optional
    'description' => 'Value added tax',
    'more_data' => 'more data here'
    )
    ));*/
    }
