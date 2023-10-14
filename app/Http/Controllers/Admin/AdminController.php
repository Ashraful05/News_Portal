<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }
    public function AdminLoginSubmit(Request $request)
    {
        $request->validate([
           'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = [
          'email'=>$request->email,
          'password'=>$request->password
        ];
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin_home');
        }else{
            return redirect()->route('admin_login')->with('error','Invalid Credentials');
        }
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
    public function ForgetPassword()
    {
        return view('admin.forget_password');
    }
    public function ForgetPasswordSubmit(Request $request)
    {
        $request->validate([
           'email'=>'required|email'
        ]);
        $data = Admin::where('email',$request->email)->first();
        if(!$data){
            return redirect()->route('admin_forget_password')->with('error','Email not found!');
        }
        $token = hash('sha256',time());
        $data->token = $token;
        $data->update();
        $reset_password_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="'.$reset_password_link.'">Click Here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('admin_login')->with('success','Please check your email and follow the steps there');
    }
    public function Index()
    {
        return view('admin.home');
    }
    public function ResetPassword($token,$email)
    {
        $data = Admin::where(['token'=>$token,'email'=>$email])->first();
        if(!$data){
            return redirect()->route('admin_login');
        }
        return view('admin.reset_password',compact('token','email'));
    }
    public function ResetPasswordSubmit(Request $request)
    {
        $request->validate([
           'password'=>'required',
           'retype_password' =>'required|same:password'
        ]);
        $data = Admin::where(['token'=>$request->token,'email'=>$request->email])->first();
        $data->password = Hash::make($request->password);
        $data->token = '';
        $data->update();
        return redirect()->route('admin_login')->with('success','Password is successfully reset');
    }
    public function ProfileInfo()
    {
        return view('admin.profile');
    }
    public function ProfileInfoUpdate(Request $request)
    {
        $adminData = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
           'name'=>'required',
//            'email'=>'required|email|unique:admins',
            'email'=>[
                'required',
                'email',
                Rule::unique('admins')->ignore($adminData->id)
            ]
        ]);
        if($request->password || $request->retype_password != ''){
            $request->validate([
               'password'=>'required',
                'retype_password'=>'required|same:password'
            ]);
            $adminData->password = Hash::make($request->password);
        }
        if($request->hasFile('photo')){
            $request->validate([
               'photo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($adminData->photo != ''){
                unlink(public_path('admin/assets/uploads/'.$adminData->photo));
            }
            $now = time();
            $ext = $request->file('photo')->extension();
            $finalName = 'admin_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('admin/assets/uploads/'),$finalName);
            $adminData->photo = $finalName;
        }

        $adminData->name = $request->name;
        $adminData->email = $request->email;
        $adminData->update();

        return redirect()->back()->with('success','Profile Info Updated!!');
    }
}
