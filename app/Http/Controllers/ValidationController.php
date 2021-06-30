<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValidationController extends Controller {
    public function showform() {
        return view('logintest');
    }
    public function validateform(Request $request) {
        print_r($request->all());
        $this->validate($request,[
            'username'=>'required|max:8',
            'password'=>'required'
        ]);
    }
}
