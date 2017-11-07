<div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        @foreach($categories as $category)
<li class="active"><a href="{{route('producs_by_cat',['id'=>$category->id])}}">{{$category->nom}}</a></li>
        @endforeach
        <li>
            <a href="{{route('panier')}}">Panier
                <span class="label label-info">{{$total_articles_panier}}</span></a>
        </li>

    </ul>
</div><!--/.nav-collapse -->