<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataTables;
use App\Promo;

class PromoController extends Controller
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
        return view('admin.promo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $edit = false;
        return view('admin.promo.form', compact('edit'));
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
                'name' => 'required|max:50|unique:promos',
            ]);

        Auth::user()->promos()->create([
                'name' => $request->name,
                'slug' => str_slug($request->name),
            ]);

        return redirect()->route('promo.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $promo = Promo::whereSlug($slug)->first();
        $property = $promo->properties()->paginate(10);
        return view('user.property.index', compact('property'));
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
        $promo = Promo::whereSlug($slug)->first();
        return view('admin.promo.form', compact('edit','promo'));
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
        $promo = Promo::whereSlug($slug)->first();

        $request->validate([
                'name' => 'required|max:100|unique:promos,name,'.$promo->id,
            ]);

        $promo->update([
                'name' => $request->name,
                'slug' => str_slug($request->name),
            ]);

        return redirect()->route('promo.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $promo = Promo::whereSlug($slug)->first();
        $promo->properties()->detach();
        $promo->delete();

        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function datatables() {
        $model = Promo::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->editColumn("name", function ($data) {
                    return '<a href="'.route('promo.show', ['promo' => $data->slug]).'">'.$data->name.'</a>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('promo.edit', ['promo' => $data->slug]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('promo.destroy', ['promo' => $data->slug]).'" data-title="'.$data->name.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'edit', 'delete'])
                ->make(true);
    }

}
