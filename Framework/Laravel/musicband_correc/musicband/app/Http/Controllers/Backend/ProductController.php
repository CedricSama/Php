<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    // Afficher un formulaire pour créer un produit
    public function create() {
        $categories = Category::all();
        return view('backend.product.createOrEdit',compact('categories'));
    }
    // Enregistrer les données du formulaire
    public function store(Request $request) {
        //dd($request);
        $this->validate(\request(),
            [
                'nom'=>"required",
                'prix_ht'=>'required|numeric',
                'description'=>'required',
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $product =new Product();
//        $product->nom = $request->nom;
//        $product->description = $request->description;
//        $product->prix_ht = $request->prix_ht;
//        $product->photo = 'photo.jpg';
        $product->fill($request->all());
        $image_name = sha1(uniqid()).'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads'),$image_name);
        $product->photo = $image_name;
        // Enregistrement dans la DB du produit
        $product->save();
        return redirect()->to(route('backend_homepage'))->with('message_success','Le produit a bien été créé');
    }

    public function edit($id_product) {
        $product =  Product::find($id_product);
        $categories = Category::all();
        return view('backend.product.createOrEdit',compact('product','categories'));
    }
    public function update($id_product, Request $request) {
        $product =  Product::find($id_product);
        $validations = [
            'nom'=>"required",
            'prix_ht'=>'required|numeric',
            'description'=>'required'
        ];
// Si le user change la photo, on ajoute au tableau $validations, la validation de la nouvelle photo
        if( null !== $request->photo) {
            $validations['photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $this->validate(\request(),$validations);
        $product->fill($request->all());
        if( null !== $request->photo) {
            $image_name = sha1(uniqid()) . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads'), $image_name);
            $product->photo = $image_name;
        }
        $product->save();
        return redirect()->to(route('backend_homepage'))->with('message_success','le produit a bien été modifié');
    }

    public function destroy($id) {
        Product::destroy($id);
        return redirect()->route('backend_homepage')->with('message_success','le produit a bien été supprimé');
    }



}
