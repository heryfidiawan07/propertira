<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{	

	public function welcome() {
		return view('welcome');
	}

    public function search(Request $request) {
        $request = $request->all();
        return view('user.property.index')->with('request', $request);
    }

}
