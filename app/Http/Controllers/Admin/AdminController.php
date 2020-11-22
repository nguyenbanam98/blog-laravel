<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function show()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', $email)->first();

        if (Hash::check($password, $admin->password)) {

            Session::put('admin_name', $admin->name);
            Session::put('id', $admin->id);

            return redirect()->route('admin.dashboard');

        } else {
            Session::flash('msg', 'Vui long thuc hien lai');
            return redirect()->route('admin.index');
        }

    }

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('id', null);

        return redirect()->route('admin.index');
    }
}
