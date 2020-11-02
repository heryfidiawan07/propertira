<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DataTables;

use App\Message;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
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
        return view('admin.message.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'name' => 'required|max:100',
                'phone' => 'required|max:20',
                'email' => 'required|max:100',
                'subject' => 'required|max:255',
                'message' => 'required',
            ]);
        Message::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

        return redirect()->back()->with('visitor-message', 'Pesan berhasil di kirim.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Message::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();
        return response()->json(['message' => 'Data successfully deleted']);
    }

    public function datatables() {
        $model = Message::query();

        return DataTables::eloquent($model)
                ->orderColumn('id', '-id $1')
                ->editColumn("created_at", function ($data) {
                    return date("d-M-Y", strtotime($data->created_at));
                })
                ->addColumn('show', function ($data) {
                    return '<a href="'.route('messages.show', ['message' => $data->id]).'" class="btn btn-success btn-sm show"><i class="fas fa-eye"></i></a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a href="'.route('messages.destroy', ['message' => $data->id]).'" data-title="'.$data->subject.'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['show', 'delete'])
                ->make(true);
    }

}
