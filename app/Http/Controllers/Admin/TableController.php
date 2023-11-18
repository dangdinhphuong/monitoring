<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ChanelController;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public $chanelController;
    public function __construct( ChanelController $chanelController){
        $this->chanelController = $chanelController;
    }
    public function index(){
        $channels = $this->chanelController->getChannelActive();
        return view('admin.pages.Table', compact('channels'));
    }
}

