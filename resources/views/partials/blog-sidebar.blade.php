<h5 class="text-muted">BLOG</h5>
<div class="row">
    @foreach($blogs as $blog)
        <div class="col-5 mb-2">
            <img src="{{ asset('storage/blog/thumb/'.$blog->image) }}" class="img-fluid w-100">
        </div>
        <div class="col-7 pl-0 mb-2">
            <a href="{{route('blog.show', ['blog' => $blog->slug])}}">
                <h6 class="p-0 m-0 font-weight-bold" style="font-size: 14px;">{{$blog->title}}</h6>
            </a>
            <div class="" style="height: 4.5em; overflow-y: hidden;">
                {{$blog->preview}}
            </div>
        </div>
    @endforeach
</div>