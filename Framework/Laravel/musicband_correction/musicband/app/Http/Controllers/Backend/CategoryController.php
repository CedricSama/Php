<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Afficher les catégories
    public function index() {
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    // Afficher le formulaire pour créer une catégorie
    public function create() {
        return view('backend.category.createOrEdit');
    }

    // Stocker dans la db les données de la nouvelle catégorie
    public function store(Request $request) {
        $this->validate(\request(),
            [
                'nom'=>"required",
            ]);
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->to(route('backend_categories_index'))->with('message_success','La catégorie a bien été créée');
    }

    public function edit($id_category) {
       $category = Category::find($id_category);
       return view('backend.category.createOrEdit',compact('category'));
    }

    public function update($id_category,Request $request) {
        $category = Category::find($id_category);
        $category->fill($request->all());
        $category->save();
        return redirect()->to(route('backend_categories_index'))->with('message_success','La catégorie a bien été créée');
    }

    public function destroy($id_category) {
        Category::destroy($id_category);
        return redirect()->to(route('backend_categories_index'))->with('message_success','La catégorie a bien été supprimée');
    }
}
