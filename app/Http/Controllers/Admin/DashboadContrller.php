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
        dd($this->hienThiTenTepTrongPublic());
        $channels = $this->chanelController->getChannelActive();
        return view('admin.pages.Home', compact('channels'));
    }
    public function hienThiTenTepTrongPublic() {
        // Đường dẫn đến thư mục "public"
        $publicPath = public_path();
    
        // Lấy danh sách tất cả các tệp trong thư mục "public"
        $files = File::allFiles($publicPath);
    
        // Hiển thị tên của từng tệp
        foreach ($files as $file) {
            echo $file->getRelativePathname() . "<br>";
        }
    }
}
