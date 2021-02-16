<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\appiontments;

use Session;

use DB;

class appointmentlistController extends Controller
{

    function index(Request $request)
    {
        if(Session::has('loginData'))
        {
            return view('viewappointment');
        }
        else
        {
            return redirect('admin');
        }
    }
    
    function list(Request $request)
    {
        // $s= $request->session()->get('loginData');
        // // return $s;
        // // die("Hello");
        // if(Session::has('loginData'))
        // {
        //     $appts = appointmentlistmodel::all();
        //     return view('viewappointment', ['appts'=>$appts,'nm'=>$s]);
        // }
        // else
        // {
        //     return redirect('admin');
        // }

        if($request->ajax()){
            $query= $request->get("query");
            if($query != ''){
                $data=DB::select('SELECT * FROM appiontments WHERE name LIKE "'.$query.'%" OR email LIKE "'.$query.'%" OR date LIKE "'.$query.'%" OR department LIKE "'.$query.'%" OR phoneno LIKE "'.$query.'%" OR created_at LIKE "'.$query.'%" Order By id Desc ');
                // $data=DB::table('appointmentlistmodels')
                // ->where('name','LIKE',$query."%")
                // ->orwhere('email','LIKE',$query."%")
                // ->orwhere('date','LIKE',$query."%")
                // ->orwhere('department','LIKE',$query."%")
                // ->orwhere('phoneno','LIKE',$query."%")
                // ->orwhere('created_at','LIKE',$query."%")
                // ->orderBy('id', 'desc')
                // ->get();

            }
            else{
                $data = DB::select('SELECT * FROM appiontments Order By id desc'); 
            }
            
            return json_encode(array('data'=>$data));
        }
        
    }


    function makeappointment(Request $request){
        if($request->ajax()){
            $name= $request->get("patientname");
            $email= $request->get("email");
            $date= $request->get("date");
            $dept= $request->get("dept");
            $phoneno= $request->get("pno");
            $message= $request->get("msg");

            // $date = strtotime($date); 
            // $date=date('Y-M-d', $date); 

            // print_r($name);
            // print_r($email);
            // print_r($date);

            // $r=DB::insert('insert into appiontments (name,email,date,department,phoneno,message) values("'.$name.'","'.$email.'","'.$date.'","'.$dept.'","'.$phoneno.'","'.$message.'")');
            //above code also works but don't save current date time

            $appointment = new appiontments;
            $appointment->name = $name;
            $appointment->email = $email;
            $appointment->date = $date;
            $appointment->department = $dept;
            $appointment->phoneno = $phoneno;
            $appointment->message = $message;
            $r=$appointment->save();

            if($r)
            {
                return "Success";
            }
            else
            {
                return "Failed";
            }
            


    }
}
}


    // function makeappointment(Request $request)
    // {
    //     $email=$request->input('email');
    //     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    //     {
    //         return back()->with('error','!!!You have Entered a Invalid Email !!!');
    //     }
    //     else 
    //     {
    //         try
    //         {
    //             $appointment = new appointmentlistmodel;
    //             $appointment->name = $request->name;
    //             $appointment->email = $request->email;
    //             $appointment->date = $request->date;
    //             $appointment->department = $request->department;
    //             $appointment->phoneno = $request->phone;
    //             $appointment->message = $request->message;
    //             $r=$appointment->save();
    //         }
    //         catch(Exception $e)
    //         {
    //             return back()->with('error','!!! Something went Wrong !!!! <br>Please Try Again <br> !!');
    //         }
            
    //         if($r)
    //         {
    //             return back()->with('success','!!! Appointments Created !!!!');
    //         }
    //         else
    //         {
    //             pass;
    //         }
    //     }

        
        
    // }