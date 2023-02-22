<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        if(auth()->user()->role_id==1){

            return to_route('admin.dashboard');
        }else{

            return to_route('employee.dashboard');
        }
    }
}
