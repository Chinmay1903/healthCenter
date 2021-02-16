<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Users;

use \App\Mail\SendMail;

use DB;

class PasswordReset extends Controller
{
    function checkEmail(Request $request)
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
            return view('mailtest');
        }
        else
        {
            return back()->with('error','!!!! The Email You are Entered is Not Regestered !!!!');
        }
        
    }

    function passRest(Request $request)
    {
        $otp=$request->input('otp');
        $id=(int)$_COOKIE["Id"];
        $password=$request->input('password');
        $cpassword=$request->input('cpassword');
        if (!isset($_COOKIE["OTP"])) 
        {
            return back()->with('error','!!! OTP Expired, Please go Back and Try Again  !!!!');
        }
        else 
        {
            if($otp==$_COOKIE["OTP"])
            {
                if ($password==$cpassword) 
                {
                    DB::select('update users set password=? where id=?;', [$password,$id]);
                    return redirect('admin')->with('success','Password Reseted');
                }
                else 
                {
                    return redirect('changepassword')->with('error','!!! Both Passwords Dont Match  !!!!  !!Please Try Again!!');
                    // return back()->with('error','!!! Both Passwords Dont Match  !!!!  !!Please Try Again!!');
                }
            }
            else 
            {
                return redirect('changepassword')->with('error','!!! Entered Worong OTP  !!!!');
                // return "Entered Worong OTP";
            }   
        }
    }
}