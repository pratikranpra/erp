<?php

namespace App\Http\Controllers\employee_admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class EmployeeAdminConstroller extends Controller
{
    
    //
    public function index(Request $request): View
    {   
        return view('employee_admin.dashboard');
    }

    public function getChangePassword(Request $request):View
    {
        return view('employee_admin.password');
    }

    public function postChangePassword(Request $request){
        $validated = $request->validate([
            'current_password'      => 'required|min:6',
            'password'              => 'required|min:6|confirmed|different:current_password',
            'password_confirmation' => 'required|min:6',
        ]);
        
        $hashedPassword = Employee::find(auth()->id())->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $new_password = Hash::make($request->password);
            $plain_password =$request->password;

            $abc = Employee::find(auth()->id())->update([ 'password' => $new_password,'plain_password'=>$plain_password ]);
            
            toastr()->success('Your password has been updated successfully!');
            
            return redirect('/employee/change-password');
    
        }else{
            throw ValidationException::withMessages(['current_password' => 'Current password does not match']);
        }
    }
}
