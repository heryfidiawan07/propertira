<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataTables;

use App\Role;
use App\Menu;
use App\Permission;

class RoleController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $menus = Menu::all();
        return view('admin.role.form', compact('edit','menus'));
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
                'name' => 'required|max:50|unique:roles',
                'menus' => 'required',
            ]);

        $role = Auth::user()->roles()->create([
                'name' => $request->name,
            ]);
        
        foreach ($request->menus as $key => $menu) {
            $actions = $request->$menu;
            foreach ($actions as $action) {
                Permission::create([
                        'role_id' => $role->id,
                        'menu_id' => $menu,
                        'action' => $action,
                    ]);
            }
        }
        return redirect()->route('role.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $role = Role::find($id);
        return $role->permissions()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit  = true;
        $menus = Menu::all();
        $role  = Role::find($id);
        return view('admin.role.form', compact('edit', 'role', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $request->validate([
                'name' => 'required|max:50|unique:roles,name,'.$role->id,
            ]);
        Auth::user()->roles()->whereId($id)->update([
                'name' => $request->name,
            ]);
        return redirect()->route('role.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function forceDelete($id) 
    {
        $role = Role::find($id);
        $role->forceDelete();
        return response()->json(['message' => 'Data successfully permanent delete']);
    }

    public function datatables() {
        $model = Role::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->editColumn("permission", function ($data) {
                    return '<a href="'.route('role.show', ['role' => $data->id]).'" class="btn btn-info btn-sm btn-permission"><i class="fas fa-shield-alt"></i></a>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('role.edit', ['role' => $data->id]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('role.destroy', ['role' => $data->id]).'" data-title="'.$data->name.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['permission', 'edit', 'delete'])
                ->make(true);
    }

}
