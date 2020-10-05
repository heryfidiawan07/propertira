<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataTables;
use App\Page;

class PageController extends Controller
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
        return view('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $edit = false;
        return view('admin.page.form', compact('edit'));
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
                'title' => 'required|max:100|unique:pages',
                'preview' => 'required|max:255',
                'content' => 'required',
                'status' => 'required',
            ]);

        Auth::user()->pages()->create([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'content' => $request->content,
            ]);

        return redirect()->route('page.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $page = Page::whereSlug($slug)->where('status','publish')->first();
        $page->update(['view' => $page->view + 1]);
        return view('user.page.show', compact('page'));
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
        $page = Page::whereSlug($slug)->first();
        return view('admin.page.form', compact('edit','page'));
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
        $page = Page::whereSlug($slug)->first();

        $request->validate([
                'title' => 'required|max:100|unique:pages,title,'.$page->id,
                'preview' => 'required|max:255',
                'content' => 'required',
                'status' => 'required',
            ]);

        Auth::user()->pages()->whereSlug($slug)->update([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'preview' => $request->preview,
                'content' => $request->content,
            ]);

        return redirect()->route('page.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Page::whereSlug($slug)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function datatables() {
        $model = Page::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->editColumn("title", function ($data) {
                    return '<a href="'.route('page.show', ['page' => $data->slug]).'">'.$data->title.'</a>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('page.edit', ['page' => $data->slug]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('page.destroy', ['page' => $data->slug]).'" data-title="'.$data->title.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['title', 'edit', 'delete'])
                ->make(true);
    }

}
