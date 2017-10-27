<?php
    namespace App\Http\Controllers\Backend;
    use App\Category;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    class CategoryController extends Controller{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(){
            $categories = Category::all();
            return view('backend.category.index', compact('categories'));
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(){
            return view('backend.category.createOrEdit');
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request){
            $this -> validate(\request(), ['nom' => "required"]);
            //Methode 2
            $category = new Category();
            $category -> fill($request -> all());
            $category -> save();
            return redirect(route('backend_homepage')) -> with('message_success', 'Nouvelle catégorie crée.');
        }
        /**
         * @param $id_category
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($id_category){
            $category = Category::find($id_category);
            return view('backend.category.show', compact('category'));
        }
        /**
         * @param $id_category
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function edit($id_category){
            $category = Category::find($id_category);
            return view('backend.category.createOrEdit', compact('category'));
        }
        /**
         * @param Request $request
         * @param         $id_category
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Request $request, $id_category){
            $category = Category::find($id_category);
            $validation = ['nom' => 'required'];
            $this->validate(\request(), $validation);
            $category -> fill($request -> all());
            $category -> save();
            return redirect(route('backend_homepage')) -> with('message_success', 'La catégorie a été mise à jour.');
        }
        /**
         * @param $id_category
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy($id_category){
            $category = Category::find($id_category);
            $category -> delete();
            return redirect(route('backend_homepage')) -> with('message_success', 'La catégorie a bien été supprimé.');
        }
    }
