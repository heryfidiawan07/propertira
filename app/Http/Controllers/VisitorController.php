<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;

class VisitorController extends Controller
{	

	public function welcome() {
		return view('welcome');
	}

    public function search(Request $request) {
        $request = $request->all();
        $minimum = str_replace('.', '', $request['minimum']);
        $maximum = str_replace('.', '', $request['maximum']);
        $property = Property::where('price', '>=' , $minimum)->where('price', '<=' , $maximum)->paginate(10);
        return view('user.property.index', compact('property'))->with('request', $request);
    }

}
