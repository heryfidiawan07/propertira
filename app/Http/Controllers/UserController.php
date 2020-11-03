<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataTables;

use App\User;

class UserController extends Controller
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
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('admin.user.form', compact('edit'));
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
                'username' => 'required|max:100|unique:users',
                'name' => 'required|max:50',
                'email' => 'required|unique:users',
                'status' => 'required',
            ]);
        Auth::user()->users()->create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'status' => $request->status,
            ]);
        return redirect()->route('user.index')->with('message', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $edit = true;
        $user = User::whereUsername($username)->first();
        return view('admin.user.form', compact('edit', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $user = User::whereUsername($username)->first();

        $request->validate([
                'username' => 'required|max:100|unique:users,username,'.$user->id,
                'name' => 'required|max:50',
                'email' => 'required|unique:users,email,'.$user->id,
            ]);
        Auth::user()->users()->whereUsername($username)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'status' => $request->status,
            ]);
        return redirect()->route('user.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        User::whereUsername($username)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function forceDelete($username) 
    {
        $user = User::whereUsername($username)->first();
        $user->forceDelete();        
        return response()->json(['message' => 'Data successfully permanent delete']);
    }

    public function datatables() {
        $model = User::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->editColumn("status", function ($data) {
                    return $data->status == 'active' ? '<span class="text-success">'.ucfirst($data->status).'</span>' : '<span class="text-danger">'.ucfirst($data->status).'</span>';
                })
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="'.route('user.edit', ['user' => $data->username]).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('user.destroy', ['user' => $data->username]).'" data-title="'.$data->username.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'edit', 'delete'])
                ->make(true);
    }

}
