<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyfirstNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;

class AdminController extends Controller
{
    public function addview()
    {

        return view('admin.add_doctor_view');
    }

    public function upload(Request $req)
    {
        $doctor            = new Doctor;
        $image             = $req->file('image');
        $imagename         = time() . '.' . $image->getClientOriginalExtension();
        $image->move('doctorImage', $imagename);

        $doctor->image     = $imagename;
        $doctor->name      = $req->name;
        $doctor->phone     = $req->number;
        $doctor->room      = $req->room;
        $doctor->speciality= $req->speciality;

        $doctor->save();

        return redirect()->back()->with('message','data inserted succesfuly');
    }

    public function show_appointment()
    {
        $appointment= Appointment::all();

        return view('admin.show_appointment',compact('appointment'));
    }

    
    public function app_cancel($id)
    {
        $cancel= Appointment::find($id);
        $cancel->status= 'canceled';

        $cancel->save();

        return redirect()->back();
    }

    public function app_aproved($id)
    {
        $cancel= Appointment::find($id);
        $cancel->status= 'aproved';

        $cancel->save();

        return redirect()->back();
    }

    public function all_doctor()
    {
        $data= Doctor::all();

        return view('admin.all_doctor', compact('data'));
    }

    public function delete_doctor($id)
    {
        $data= Doctor::find($id);
        $data->delete();

        return redirect()->back();

    }

    public function update_doctor($id)
    {
        $data= Doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }

    public function edit_doctor(Request $req, $id)
    {

        $data= Doctor::find($id);

        $data->name      = $req->name;
        $data->phone     = $req->number;
        $data->speciality= $req->speciality;
        $data->room      = $req->room;
        
        $image= $req->file('image');
        if($image)
        {
            $imagename= time() . '.' . $image->getClientOriginalExtension();
            $image->move('doctorImage', $imagename);
            
            $data->image= $imagename;

        }

        $data->save();

        return redirect()->back()->with('message', 'data updated successfuly');
       

       

    }

    public function email_view($id)
    {
        $data= Appointment::find($id);

        return view('admin.email_view', compact('data'));
    }

    public function send_email(Request $req, $id)
    {
        $data= Appointment::find($id);

        $details=[
            'greeting'   => $req->greeting,
            'body'       => $req->body,
            'actiontext' => $req->actiontext,
            'actionurl'  => $req->actionurl,
            'endpart'    => $req->endpart,
           

        ];

        Notification::send($data,new MyFirstNotification($details));

        return redirect('show_appointment');

    }
}
