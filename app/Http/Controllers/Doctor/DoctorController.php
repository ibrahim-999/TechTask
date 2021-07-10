<?php

namespace App\Http\Controllers\Doctor;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.doctor_dashboard');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];

            $customMessage = [
                'email.required' => 'Email Address is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required'
            ];

            $this->validate($request,$rules,$customMessage);

            if(Auth::guard('doctor')->attempt(['email'=>$data['email'],'password'=>$data['password']]))
            {
                return redirect('doctor/dashboard');
            }
            else{
                Session::flash('error_message', ' Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('doctor.doctor_login');
    }
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/doctor');
    }

    public function update()
    {

    }
    public function destroy()
    {

    }

}
