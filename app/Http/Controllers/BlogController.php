<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use DataTables;

use App\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            return $this->datatables();
        }
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('admin.blog.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'title'   => 'required|max:100|unique:blogs',
                'preview' => 'required|max:255',
                'content' => 'required',
                'status'  => 'required',
                'image'   => 'required|mimes:jpeg,jpg,png,gif',
            ]);

        $image    = $request->file('image');
        $ex       = $image->getClientOriginalExtension();
        $imgName  = time().'-'.str_slug($request->title).'.'.$ex;
        $path     = $image->getRealPath();

        $img      = Image::make($path)->resize(null, 630, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode($ex);
        $thumb    = Image::make($path)->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode($ex);

        Storage::put('public/blog/img/'.$imgName, $img->__toString());//Laravel Storage
        Storage::put('public/blog/thumb/'.$imgName, $thumb->__toString());//Laravel Storage

        Auth::user()->blogs()->create([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'image' => $imgName,
                'content' => $request->content,
                'sticky' => $request->sticky,
                'tags' => $request->tags,
            ]);

        return redirect()->route('blog.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $blog = Blog::whereSlug($slug)->first();
        $blog->update(['view' => $blog->view + 1]);
        return view('user.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $edit = true;
        $blog = Blog::whereSlug($slug)->first();
        return view('admin.blog.form', compact('edit', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {   
        $blog = Blog::whereSlug($slug)->first();

        $request->validate([
                'title' => 'required|max:100|unique:blogs,title,'.$blog->id,
                'preview' => 'required|max:255',
                'content' => 'required',
                'status'  => 'required',
                'image'   => 'mimes:jpeg,jpg,png,gif',
            ]);

        $imgName = $blog->image;
        if ( $request->hasFile('image') ) {
            Storage::delete('public/blog/img/'. $blog->image);
            Storage::delete('public/blog/thumb/'. $blog->image);

            $image    = $request->file('image');
            $ex       = $image->getClientOriginalExtension();
            $imgName  = time().'-'.str_slug($request->title).'.'.$ex;
            $path     = $image->getRealPath();

            $img      = Image::make($path)->resize(null, 630, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode($ex);
            $thumb    = Image::make($path)->resize(null, 200, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode($ex);

            Storage::put('public/blog/img/'.$imgName, $img->__toString());//Laravel Storage
            Storage::put('public/blog/thumb/'.$imgName, $thumb->__toString());//Laravel Storage
        }

        Auth::user()->blogs()->whereSlug($slug)->update([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'image' => $imgName,
                'content' => $request->content,
                'sticky' => $request->sticky,
                'tags' => $request->tags,
            ]);

        return redirect()->route('blog.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Blog::whereSlug($slug)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function forceDelete($slug) 
    {
        $blog = Blog::whereSlug($slug)->first();

        Storage::delete('public/blog/img/'.$blog->image);
        Storage::delete('public/blog/thumb/'.$blog->image);

        $blog->forceDelete();
        
        return response()->json(['message' => 'Data successfully permanent delete']);
    }

    public function datatables() {
        $model = Blog::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->addColumn('image', function ($data) {
                    return '<img src="'.url('storage/blog/thumb/'.$data->image).'" width="100" class="img-thumbnail" />';
                })
                ->editColumn("title", function ($data) {
                    return '<a href="'.route('blog.show', ['blog' => $data->slug]).'">'.$data->title.'</a>';
                })
                ->editColumn("status", function ($data) {
                    return $data->status == 'publish' ? '<span class="text-success">'.ucfirst($data->status).'</span>' : '<span class="text-danger">'.ucfirst($data->status).'</span>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('blog.edit', ['blog' => $data->slug]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('blog.destroy', ['blog' => $data->slug]).'" data-title="'.$data->title.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['image', 'title', 'status', 'edit', 'delete'])
                ->make(true);
    }

}
