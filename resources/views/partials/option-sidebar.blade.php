<h5 class="text-muted">PROMO</h5>
@foreach($promos as $promo)
	<p><a href="{{route('promo.show', ['promo' => $promo->slug])}}" class="text-muted"><i class="fas fa-fire text-danger"></i> {{$promo->name}}</a></p>
@endforeach

<hr>

<h5 class="text-muted">AREA</h5>
@foreach($areas as $area)
	<p><a href="{{route('area.show', ['area' => $area->slug])}}" class="text-muted"><i class="fas fa-map-marked-alt text-success"></i> {{$area->name}}</a></p>
@endforeach

<hr>

<h5 class="text-muted">KATEGORI</h5>
@foreach($categories as $category)
	<p><a href="{{route('category.show', ['category' => $category->slug])}}" class="text-muted"><i class="fas fa-tag text-info"></i> {{$category->name}}</a></p>
@endforeach
