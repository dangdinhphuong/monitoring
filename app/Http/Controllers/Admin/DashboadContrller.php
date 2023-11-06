<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboadContrller extends Controller
{
    public function __construct(){

    }
    public function index(){
        return view('admin.app');
    }
}
