<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use DataTables;

use App\Area;
use App\Promo;
use App\Category;
use App\Property;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
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
        return view('admin.property.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $promo = Promo::all();
        $area = Area::all();
        $category = Category::all();
        return view('admin.property.form', compact('edit', 'promo', 'area', 'category'));
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
                'title' => 'required|max:100|unique:properties',
                'preview' => 'required|max:255',
                'address' => 'required',
                'price' => 'required',
                'content' => 'required',
                'status' => 'required',
                'images' => 'required',
                'images.*' => 'mimes:jpeg,jpg,png,gif',
            ]);

        $prop = Auth::user()->properties()->create([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'address' => $request->address,
                'price_text' => $request->price_text,
                'price' => str_replace('.', '', $request->price),
                'update' => $request->update,
                'content' => $request->content,
                'event' => $request->event,
                'sticky' => $request->sticky,
            ]);
            
        $prop->promos()->attach($request->promo);
        $prop->areas()->attach($request->area);
        $prop->categories()->attach($request->category);

        $images = $request->file('images');
        foreach ($images as $key => $img) {
            $ex       = $img->getClientOriginalExtension();
            $imgName  = time().'-'.str_slug($request->title).'.'.$ex;
            $path     = $img->getRealPath();

            $img      = Image::make($path)->resize(null, 630, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode($ex);
            $thumb    = Image::make($path)->resize(null, 200, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode($ex);

            Storage::put('public/property/img/'.$imgName, $img->__toString());//Laravel Storage
            Storage::put('public/property/thumb/'.$imgName, $thumb->__toString());//Laravel Storage

            $prop->medias()->create(['image' => $imgName]);
        }

        return redirect()->route('property.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $prop = Property::whereSlug($slug)->where('status','publish')->first();
        $prop->update(['view' => $prop->view + 1]);
        return view('user.property.show', compact('prop'));
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
        $promo = Promo::all();
        $area = Area::all();
        $category = Category::all();
        $property = Property::whereSlug($slug)->first();
        return view('admin.property.form', compact('edit', 'property', 'promo', 'area', 'category'));
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
        $prop = Property::whereSlug($slug)->first();

        $request->validate([
                'title' => 'required|max:100|unique:properties,title,'.$prop->id,
                'preview' => 'required|max:255',
                'address' => 'required',
                'price' => 'required',
                'content' => 'required',
                'status' => 'required',
                'images.*' => 'mimes:jpeg,jpg,png,gif',
            ]);

        Auth::user()->properties()->whereSlug($slug)->update([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'address' => $request->address,
                'price_text' => $request->price_text,
                'price' => str_replace('.', '', $request->price),
                'update' => $request->update,
                'content' => $request->content,
                'event' => $request->event,
                'sticky' => $request->sticky,
            ]);
            
        $prop->promos()->sync($request->promo);
        $prop->areas()->sync($request->area);
        $prop->categories()->sync($request->category);

        if ( $request->hasFile('image') ) {
            $images = $request->file('images');
            foreach ($images as $key => $img) {
                $ex       = $img->getClientOriginalExtension();
                $imgName  = time().'-'.str_slug($request->title).'.'.$ex;
                $path     = $img->getRealPath();

                $img      = Image::make($path)->resize(null, 630, function ($constraint) {
                                $constraint->aspectRatio();
                            })->encode($ex);
                $thumb    = Image::make($path)->resize(null, 200, function ($constraint) {
                                $constraint->aspectRatio();
                            })->encode($ex);

                Storage::put('public/property/img/'.$imgName, $img->__toString());//Laravel Storage
                Storage::put('public/property/thumb/'.$imgName, $thumb->__toString());//Laravel Storage

                $prop->medias()->create(['image' => $imgName]);
            }
        }

        return redirect()->route('property.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Property::whereSlug($slug)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function forceDelete($slug) 
    {
        $prop = Property::whereSlug($slug)->first();
        
        $prop->promos()->detach();
        $prop->areas()->detach();
        $prop->categories()->detach();

        foreach ($prop->medias as $media) {
            Storage::delete('public/property/img/'.$media->image);
            Storage::delete('public/property/thumb/'.$media->image);
        }
        $prop->forceDelete();
        
        return response()->json(['message' => 'Data successfully permanent delete']);
    }

    public function datatables() {
        $model = Property::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->addColumn('image', function ($data) {
                    return '<img src="'.url('storage/property/thumb/'.$data->medias[0]->image).'" width="100" class="img-thumbnail" />';
                })
                ->editColumn("title", function ($data) {
                    return '<a href="'.route('property.show', ['property' => $data->slug]).'">'.$data->title.'</a>';
                })
                ->editColumn("status", function ($data) {
                    return $data->status == 'publish' ? '<span class="text-success">'.ucfirst($data->status).'</span>' : '<span class="text-danger">'.ucfirst($data->status).'</span>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('property.edit', ['property' => $data->slug]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('property.destroy', ['property' => $data->slug]).'" data-title="'.$data->title.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['image', 'title', 'status', 'edit', 'delete'])
                ->make(true);
    }

}
