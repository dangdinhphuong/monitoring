<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ChanelController;
use Illuminate\Support\Facades\File;

class DashboadContrller extends Controller
{
    public $chanelController;
    public function __construct( ChanelController $chanelController){
        $this->chanelController = $chanelController;
    }
    public function index(){
        $channels = $this->chanelController->getChannelActive();
        return view('admin.pages.Home', compact('channels'));
    }
}
