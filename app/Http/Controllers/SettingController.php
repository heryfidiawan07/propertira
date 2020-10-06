<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
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
    public function index()
    {   
        $sett = Setting::first();
        return view('admin.setting.index', compact('sett'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function icon(Request $request)
    {
        $request->validate([
                'icon' => 'required|mimes:jpeg,jpg,png,gif',
            ]);

        if ( $request->hasFile('icon') ) {
            Storage::delete('public/icon/'.'icon.jpeg');
        }
        $request->file('icon')->storeAs('public/icon', 'icon.jpeg');
        
        return redirect()->route('setting.index')->with('message', 'Icon successfully updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logo(Request $request)
    {
        $request->validate([
                'logo' => 'required|mimes:jpeg,jpg,png,gif',
            ]);

        if ( $request->hasFile('logo') ) {
            Storage::delete('public/logo/'.'logo.jpeg');
        }
        $request->file('logo')->storeAs('public/logo', 'logo.jpeg');
        
        return redirect()->route('setting.index')->with('message', 'Logo successfully updated');
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
                'author' => 'required',
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'hp' => 'required',
                'whatsapp' => 'required',
                'company' => 'required',
                'address' => 'required',
            ]);
        Setting::create([
                'author' => $request->author,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'hp' => $request->hp,
                'whatsapp' => $request->whatsapp,
                'company' => $request->company,
                'address' => $request->address,
            ]);
        return redirect()->route('setting.index')->with('message', 'Data successfully created');
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
        $request->validate([
                'author' => 'required',
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'hp' => 'required',
                'whatsapp' => 'required',
                'company' => 'required',
                'address' => 'required',
            ]);
        Setting::whereId($id)->update([
                'author' => $request->author,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'hp' => $request->hp,
                'whatsapp' => $request->whatsapp,
                'company' => $request->company,
                'address' => $request->address,
            ]);
        return redirect()->route('setting.index')->with('message', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
