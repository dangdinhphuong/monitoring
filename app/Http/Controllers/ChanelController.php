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
            'status' => 'required|in:0,1',
            'api_key' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập dữ liệu name',
            'channel.required' => 'Vui lòng nhập dữ liệu channel',
            'channel.unique' => 'Dữ liệu channel đã tồn tại',
            'status.required' => 'Vui lòng chọn trạng thái (DISCONECT hoặc CONNECT)',
            'status.in' => 'Trạng thái phải không hợp lệ',
            'api_key.required' => 'Vui lòng nhập dữ liệu api key',
        ]);

        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về phản hồi JSON với thông báo lỗi
            return response()->json([
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); // HTTP status code 422
        }
        try {
            $data = $request->all();
            $data['status'] =  $data['status'] ? true : false;
            $data = Channel::create($data);
        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được lưu thành công', 'data' => $data], JsonResponse::HTTP_OK);
    }

    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
            'channel' => 'required|unique:channel,channel,' . $request->id,
            'status' => 'required|in:0,1',
            'api_key' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập dữ liệu name',
            'channel.required' => 'Vui lòng nhập dữ liệu channel',
            'channel.unique' => 'Dữ liệu channel đã tồn tại',
            'status.required' => 'Vui lòng chọn trạng thái (DISCONECT hoặc CONNECT)',
            'status.in' => 'Trạng thái phải không hợp lệ',
            'api_key.required' => 'Vui lòng nhập dữ liệu api key',
        ]);
        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về phản hồi JSON với thông báo lỗi
            return response()->json([
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); // HTTP status code 422
        }

        try {
            $data = $request->except('id');
            $data['status'] =  $data['status'] ? true : false;
            $channel = Channel::firstOrNew(['id' => $request->id]);
            $channel->update($data);
        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được cập nhật thành công', 'data' => $channel], JsonResponse::HTTP_OK);

    }

    public function getAll(){
        return  Channel::get();
    }
    public function getChannelActive(){
        return  Channel::where('status', true)->get();
    }
    public function delete($id){
        try {
            Channel::find($id)->delete();
        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được xóa thành công'], JsonResponse::HTTP_OK);
    }

}