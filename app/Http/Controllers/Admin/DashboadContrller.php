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
        $this->hienThiTenTepTrongPublic();
        dd($this->hienThiTenTepTrongPublic('storage/app/public'));
        $channels = $this->chanelController->getChannelActive();
        return view('admin.pages.Home', compact('channels'));
    }
    public function hienThiTenTepTrongPublic($folderPath = 'storage') {
    // Kiểm tra xem đường dẫn thư mục có tồn tại không
    if (!is_dir($folderPath)) {
        return "Thư mục không tồn tại.";
    }

    // Lấy danh sách tất cả các tệp trong thư mục
    $files = scandir($folderPath);

    // Lọc ra các tệp thực sự bằng cách loại bỏ "." và ".."
    $filteredFiles = array_diff($files, array('.', '..'));

    // Hiển thị tên các tệp
    if (count($filteredFiles) > 0) {
        echo "Danh sách các tệp trong thư mục '$folderPath':<br>";
        foreach ($filteredFiles as $file) {
            echo "$file<br>";
        }
    } else {
        echo "Thư mục '$folderPath' không chứa tệp nào.";
    }
    }
}
