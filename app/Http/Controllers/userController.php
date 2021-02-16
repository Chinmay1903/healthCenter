<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Admin; 

class userController extends Controller
{
    function login(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        $data= DB::select('select * from Admin where email=? and password=?', [$email,$password]);
        $name=$data[0]->name;
        $data= $data[0]->id;
        // return $data;
        // return $name;
        if(!empty($data))
        {
            $request->session()->put('loginData',$data);
            $request->session()->put('Title',$name);
            return redirect('applist');
        }
        else
        {
            return back()->with('error','!! Entered Email or Password is Wrong !!');
        }
        
    }

    function logout(Request $request)
    {
        $request->session()->forget('loginData');
        $request->session()->forget('Title');
        return redirect('/');
    }


    function createadmin(Request $request)
    {
        $password=$request->input('password');
        $cpassword=$request->input('cpassword');
        $email=$request->input('email');
        $emailcheck = DB::table('Admin')->where('email',$email)->count();
        // return $emailcheck;
        // $s= $request->session()->get('loginData');
        // return $s;
        // die("Hello");
        if(Session::has('loginData'))
        {
            if($emailcheck = 0)
            {
                if($password==$cpassword)
                {
                    try
                    {
                        $user = new Admin;
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = $request->password;
                        $r=$user->save();
                    }
                    catch(Exception $e)
                    {
                        return redirect('admincreate')->with('error','Msg' .$e->getMessage());
                    }
                    if($r)
                    {
                        return redirect('admincreate')->with('success','!!! Admin Resigtered !!! PLease Logout to Sign With New Admin');
                    }
                    else
                    {
                        return redirect('admincreate')->with('error','!!! Somthing Went Wrong Please Try Again !!!');
                    }
                }
                else 
                {
                    return redirect('admincreate')->with('error','!!! Both Password dont Match !!!');
                }
            }
            else {
                return redirect('admincreate')->with('error','!!! Email Already in Use !!! PLease Try Different Email Address');
            }    
        }
        else
        {
            // return redirect('admin');
            return redirect('admin')->with('error','!!! First Login from Another Registered Admin to Register !!!');
        }       
        
    }

}
