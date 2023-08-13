<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
       if(Auth::id())
       {
            $usertype= Auth()->user()->usertype;
            if($usertype== 'user')
            {
                $doctors= Doctor::all();
                return view('home.homepage', compact('doctors'));
            }
            if($usertype== 'admin')
            {
                return view('admin.admin_dashboard');
            }
            else
            {
                return redirect()->back();
            }

       }
    }
    
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctors= Doctor::all();
            return view('home.homepage', compact('doctors'));
        }
        
    }

    public function appointment(Request $request)
    {
        $data= new Appointment;

        $data->name= $request->name;
        $data->email= $request->email;
        $data->date= $request->date;
        $data->doctor= $request->doctor;
        $data->phone= $request->number;
        $data->message= $request->message;
        $data->status= "in progress";
        if(Auth::id())
        {
            $data->user_id= Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'appointment is in progress');
       

    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid= Auth::user()->id;
            $appoint= Appointment::where('user_id', $userid)->get();

            return view('home.my_appointment', compact('appoint'));

        }
        else
        {
            return redirect()->back();

        }

        
    }

    public function cancel_appoint($id)
    {
        $data= Appointment::find($id);
        $data->delete();

        return redirect()->back();

    }

    
}
