<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function admin_dashboard(){
        return view('backend\dashboard\admin_dashboard');
    }
}
