<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Userdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'zip' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone,
            'zip_code' => $request->zip,
        ]);
        return redirect()->back()->with('success','You are successfully registered!');
    }
    public function userdetails(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Userdetails::create([
            'zip_code' => $request->zip,
            'city' => $request->city,
            'email' => $request->email,
            
        ]);
        return redirect()->back()->with('success','You are successfully registered!');
    }
}
