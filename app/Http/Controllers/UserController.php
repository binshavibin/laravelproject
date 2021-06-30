<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
    public function show()
    {

        $userList = DB::table('users')->get(); // print_r($userList);die();
        return view('user', array('users'=>$userList));

    }
    public function create()
    {
        for($i=0;$i<=500;$i++) {
            $dataArr = array(
                'name' => "binsha".$i, 'email' => 'binsha'.$i.'@gmail.com', 'password' => bcrypt("Password")

            );
            DB::table('users')->insert($dataArr);
        }
        echo 'insert data success';


    }
    public function uploadImage(Request $request)
    {
        
        print_r($request->image);
        if($request->hasFile('image')) { 
            echo 'started uploading............';
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            return 'uploaded';
        }

    }

    public function postRegister(Request $request) {

    }
}
