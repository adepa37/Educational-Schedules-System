<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (!empty(Auth::check())) {
            if (Auth::user()->usertype == 1) {
                return view('admin/dashboard', $data);
            }
            elseif (Auth::user()->usertype == 2) {
                return view('teacher/dashboard', $data);
            }
            elseif (Auth::user()->usertype == 3) {
                return view('student/dashboard', $data);
            }
        }
    }
}
