<?php
    namespace App\Http\Controllers\Backend;
    use App\Category;
    use App\Product;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class ProductController extends Controller{
        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index(){
            $products = Product::all();
            $categories = Category::all();
            return view('backend.product.index', compact('products'),compact('categories'));
        }
        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create(){
            $categories = Category::all();
            return view('backend.product.createOrEdit', compact('categories'));
        }
        /**
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store(Request $request){
            //dd($request);
            $this->validate(\request(),[
                'nom'=>"required",
                'prix_ht'=>"required | numeric",
                'description'=>"required",
                'photo'=>"required | image | mimes:jpeg,jpg,png,gif,svg | max:2048"
            ]);
            //Methode 2
            $product = new Product();
            $product->fill($request->all());
            $image_name = sha1(time().uniqid()).'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads'), $image_name);
            $product->photo = $image_name;
            $product->save();
            return redirect(route('backend_product_create'))->with('message_success', 'Le produit a bien été crée.');
            //Methode 1
            //$product = new Product();
            // $product -> nom = $request -> nom;
            // $product -> description = $request -> description;
            // $product -> prix_ht = $request -> prix_ht;
            // $product -> photo = 'photo.jpg';
            // Enregistrement dans la DB
            // $product -> save();
            // return view('backend.product.createOrEdit');
        }
        /**
         * @param $id_product
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function edit($id_product){
            $product = Product::find($id_product);
            $categories = Category::all();
            return view('backend.product.createOrEdit', compact('product'), compact('categories'));
        }
        /**
         * @param         $id_product
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update($id_product, Request $request){
            $product = Product::find($id_product);
            $validations = [
                'nom'=>"required",
                'prix_ht'=>"required | numeric",
                'description'=>"required"
            ];
            //Si le user change la photo, on ajoute au tableau validation le test de validation de la photo
            if($request->photo !== null){
                $validations['photo']="required | image | mimes:jpeg,jpg,png,gif,svg | max:2048";
            }
            $this->validate(\request(), $validations);
            $product->fill($request->all());
            if($request->photo !== null){
                $validations['photo'] = "required | image | mimes:jpeg,jpg,png,gif,svg | max:2048";
                $image_name = sha1(time().uniqid()).'.'.$request -> photo -> getClientOriginalExtension();
                $request -> photo -> move(public_path('uploads'), $image_name);
                $product -> photo = $image_name;
            }
            $product->save();
            return redirect(route('backend_homepage'))->with('message_success', 'Le produit a bien été mise à jour.');
        }
        /**
         * @param $id_product
         * @return \Illuminate\Http\RedirectResponse
         */
        public function delete($id_product){
            $product = Product::find($id_product);
            $product->delete();
            return redirect(route('backend_homepage'))->with('message_success', 'Le produit a bien été supprimé.');
        }
    }
