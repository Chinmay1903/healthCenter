<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use \App\Mail\SendMail;

class User extends Controller
{
    public function index()
    {
        return view('user/login');
    }

    public function home()
    {
        return view('user/home');
    }

    public function login(Request $request)
    {  
        $email=$request->input('email');
        $password=$request->input('password');
        $data= DB::select('select * from users where email=? and password=?', [$email,$password]);
        print_r($data);
        if(!empty($data))
        {
            $name=$data[0]->name;
            $id= $data[0]->id;
            // return $data;
            // return $name;
            
            $request->session()->put('UserloginData',$data);
            $request->session()->put('User_Title',$name);
            return redirect('user/home');
        }
        else
        {
            return back()->with('error','!! Entered Email or Password is Wrong !!');
        }
    }

    public function otprequest(Request $request)
    {
        $email=$request->input('email');
        $data= DB::select('select * from users where email=?', [$email]);
        // print_r($data[0]->email);
        if(!empty($data))
        {
            $rand=rand(10000,99999);
            $recivermail=$data[0]->email;
            $recivername=$data[0]->name;
            setcookie("OTP", $rand, time()+10*60);
            setcookie("Id", $data[0]->id, time()+10*60);
            // $request->session()->put('mailData',$data);
            $request->session()->put('txt',$recivermail);
            $details = [
                // 'title' => 'Title: Mail for Password Reset',
                // 'body' => 'Body: OTP is '.$rand.''
                'title' => $recivername,   
                'body' => $rand
            ];
            \Mail::to($recivermail)->send(new SendMail($details));
            if (\Mail::failures()) {
                return "Mail not send";
            }
            return view('user/passwordreset');
        }
        else
        {
            return back()->with('error','!!!! The Email You are Entered is Not Regestered f!! Please Register Yourself !!!!');
        }
}

    public function passwordReset()
    {
        
    }
}
