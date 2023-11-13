<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Http\Requests\ChannelRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Exception;

class ChanelController extends Controller
{
    public function index(){
       $channel =  Channel::get();
        return view('admin.pages.Channel', compact('channel'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'channel' => 'required|unique:channel',
        ], [
            'name.required' => 'Vui lòng nhập dữ liệu name',
            'channel.required' => 'Vui lòng nhập dữ liệu channel',
            'channel.unique' => 'Dữ liệu channel đã tồn tại',
        ]);

        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về phản hồi JSON với thông báo lỗi
            return response()->json([
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); // HTTP status code 422
        }
        try {
       $data = Channel::create($request->all());
    } catch (Exception $exception) {
        return response()->json([
            'errors' => $exception,
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
    }
        return response()->json(['message' => 'Dữ liệu đã được lưu thành công','data'=> $data], JsonResponse::HTTP_OK);
    }
}
