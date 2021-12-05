<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contacts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validateFormInfo(Request $request) {
        $this->validate($request,[
            'firstname'=>'required|max:20',
            'lastname'=>'required|max:20',
            'email'=>'required|min:8',
            'message'=>'required|min:1',
        ]);
        // If the validation rules pass, your code will keep executing normally:
        return view('/contact', compact('request'));
    }

    public function showmessages() {
        $data = Contacts::orderBy('created_at','desc')->get();
        return view('contact-messages', ['contacts'=>$data]);
    }
}
