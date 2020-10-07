<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Share;
use App\Setting;
use App\SocialMedia;
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
        $share = Share::all();
        $sett = Setting::first();
        $social = SocialMedia::all();
        return view('admin.setting.index', compact('sett','social','share'));
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
                'whatsapp_link' => 'required',
                'company' => 'required',
                'address' => 'required',
                'email' => 'required',
            ]);
        Setting::create([
                'author' => $request->author,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'hp' => $request->hp,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'whatsapp_link' => $request->whatsapp_link,
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
                'whatsapp_link' => 'required',
                'company' => 'required',
                'address' => 'required',
                'email' => 'required',
            ]);
        Setting::whereId($id)->update([
                'author' => $request->author,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'hp' => $request->hp,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'whatsapp_link' => $request->whatsapp_link,
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

    public function socialMediaActivated() {
        $class = ['fab fa-facebook','fab fa-twitter','fab fa-whatsapp','fas fa-envelope','fab fa-youtube','fab fa-line','fab fa-linkedin'];
        $name  = ['facebook','twitter','whatsapp', 'envelope','youtube','line','linkedin'];
        
        $old = SocialMedia::onlyTrashed()->get();
        if ($old->count()) {
            SocialMedia::onlyTrashed()->restore();
        }else {
            foreach ($name as $key => $n) {
                SocialMedia::create([
                        'name' => $n,
                        'class' => $class[$key],
                    ]);
            }
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully activated');
    }
    
    public function socialMedia(Request $request)
    {
        $req = $request->all();
        foreach ($req as $key => $url) {
            SocialMedia::whereName($key)->update([
                    'name' => $key,
                    'url' => $url,
                ]);
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully updated');
    }

    public function shareActivated() {
        $class = ['fab fa-facebook','fab fa-twitter','fab fa-whatsapp','fas fa-envelope','fab fa-google'];
        $name  = ['facebook','twitter','whatsapp', 'envelope','google'];

        $old = Share::onlyTrashed()->get();
        if ($old->count()) {
            Share::onlyTrashed()->restore();
        }else {
            foreach ($name as $key => $n) {
                Share::create([
                        'name' => $n,
                        'class' => $class[$key],
                    ]);
            }
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully activated');
    }
    
    public function Share(Request $request)
    {
        $req = $request->all();
        foreach ($req as $key => $url) {
            Share::whereName($key)->update([
                    'name' => $key,
                    'url' => $url,
                ]);
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully updated');
    }

    public function softDeleteShare() {
        $share = Share::all();
        foreach ($share as $s) {
            $s->delete();
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully deleted');
    }

    public function softDeleteSocial() {
        $social = SocialMedia::all();
        foreach ($social as $s) {
            $s->delete();
        }
        return redirect()->route('setting.index')->with('message', 'Data successfully deleted');
    }

}
