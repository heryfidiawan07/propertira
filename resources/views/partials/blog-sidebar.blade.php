<h5 class="text-muted">BLOG</h5>
<div class="row">
    @for ($i = 0; $i < 5; $i++)
        <div class="col-5 mb-2">
            <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/06e4e70ce93d47.jpg" class="img-fluid w-100">
        </div>
        <div class="col-7 pl-0 mb-2">
            <h6 class="p-0 m-0 font-weight-bold" style="font-size: 14px;">Title {{$i}}</h6>
            <div class="" style="height: 4.5em; overflow-y: hidden;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            </div>
        </div>
    @endfor
</div>