<div id="navbar" class="collapse navbar-collapse">
    
    <ul class="nav navbar-nav">
        @foreach($categories as $category)
            <li class="active"><a href="{{route('product_by_cat', ['id'=> $category->id])}}">{{$category->nom}}</a></li>
        @endforeach
        <li role="separator" class="divider"></li>
        <li><a href="#">Panier</a></li>
    </ul>
</div><!--/.nav-collapse -->

