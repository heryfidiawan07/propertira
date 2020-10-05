<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProperty($id)
    {   
        $media = Media::find($id);
        Storage::delete('public/property/img/'.$media->image);
        Storage::delete('public/property/thumb/'.$media->image);
        $media->delete();

        return back()->with('message', 'Data successfully deleted');
    }

}
