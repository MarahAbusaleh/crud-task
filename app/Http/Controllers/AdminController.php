<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index()
    {
        return view("Admin.index");
    }


    public function AdminLogin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('id', $admin->id);

                return redirect()->route('AdminDashboard');
            } else {
                Alert::error('error', 'Password does not match');
                return back();
            }
        } else {
            Alert::error('error', 'This email is not registered');
            return back();
        }
    }

    public function logout()
    {
        if (Session::has('id')) {
            Session::pull('id');
        }
        return redirect()->route('login');
    }
}
