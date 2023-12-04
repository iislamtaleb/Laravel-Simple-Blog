<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function profile()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        
        return view('livewire.profile',compact('user'));
        
    }


    public function change_name(Request $request)
    {
        
        $user = Auth::user();


        

        if (Hash::check($request->password, $user->password)) {
            
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $user->name = $request->name;
            $user->save();
            
            Alert::success('Name Updated Successfully','Your Name Changed Successfully');
            return redirect()->back();
        }

        elseif ($request->password != $user->password) {
            
            Alert::error('Wrong ','Enter The Correct Password Please!');
            
            return redirect()->back();
        }
        
    }

    public function change_email(Request $request)
    {
        
        $user = Auth::user();


        

        if (Hash::check($request->password, $user->password)) {
            
            if ($request->email != $user->email) {
                $emailexists = User::where('email',$request->email)->exists();

                if (!$emailexists) {
                    $user->email = $request->email;
                    $user->save();
                    Alert::success('Email Updated Successfully','Your Email Changed Successfully');

                    return redirect()->back();
                }

                else {
                    Alert::error('Email Not Unique', 'The email you entered is already in use.');
                    return redirect()->back();
                }
            }

            else {
                Alert::error('No Change' ,'The new email is the same as the current email.');
                return redirect()->back();
            }

            


            
            
        }

        elseif ($request->password != $user->password) {
            
            Alert::error('Wrong ','Enter The Correct Password Please!');
            return redirect()->back();

        }
        
    }





    public function change_password(Request $request)
    {
        
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {

            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                
                Alert::success('Password Updated Successfully','Your Password Changed Successfully');
                return redirect()->back();
            }
            
            else {
                Alert::error('Password Confirmation Error','Your New Password Dont Match Your Confirmation Password');
                return redirect()->back();
            }
        }

        elseif ($request->password != $user->password) {
            
            Alert::error('Wrong ','Enter The Your Correct Password Please!');
            return redirect()->back();

        }
        
    }



    

}
