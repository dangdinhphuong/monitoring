<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config;
use App\Services\Admin\ConfigService;
use App\Http\Requests\Admin\ConfigCreateRequest;
use App\Http\Requests\Admin\ConfigUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Exception;

class ConfigController extends Controller
{
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }
    public function config()
    {
        //$config= config::first();
        return view('admin.pages.auth.config');
    }

    public function index()
    {
        $settings =  config::get();
        return view('admin.pages.Setting', compact('settings'));
    }

    public function store(ConfigCreateRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về phản hồi JSON với thông báo lỗi
            return response()->json([
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); // HTTP status code 422
        }

        try {
            $data = $request->except('_token');
         if($data['type'] == 'file'){
            $pathFile = $request->file('value')->store('public/config');
            $pathFile = str_replace("public", "storage", $pathFile); //storage/config/PBI7HBCnIbAISN6NzN4PoCBn14cCa2uB1kHZ2kGu.jpg
            $data['value'] = $pathFile;
         }
         $config = config::create($data);

        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được lưu thành công', 'data' => $config], JsonResponse::HTTP_OK);
    }

    public function update(ConfigUpdateRequest $request, $id)
    {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validator->fails()) {
            // Nếu xác thực thất bại, trả về phản hồi JSON với thông báo lỗi
            return response()->json([ 'errors' => $validator->errors(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY); // HTTP status code 422
        }

        try {
            $data = $request->all();
            $config = config::firstOrNew(['id' => $id]);
            if(empty($config)){
                return response()->json([ 'errors' => "Không thể tìm được dữ liệu",], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
         if($data['type'] == 'file'){
            if(!empty($data['value'])){
                $pathFile = $request->file('value')->store('public/config');
                $pathFile = str_replace("public", "storage", $pathFile);
                $data['value'] = $pathFile;
                if (file_exists($config->value) && !empty($data['value'])) {
                    unlink($config->value);
                }
            }else{
                unset($data['value']);
            }

         }
         $config->update($data);

        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được lưu thành công', 'data' => $config], JsonResponse::HTTP_OK);
    }
    public function delete($id){
        try {
            $config = config::firstOrNew(['id' => $id]);
            if($config->type == 'file' && file_exists($config->value)){
                unlink($config->value);
             }
             $config->delete();
        } catch (Exception $exception) {
            return response()->json([
                'errors' => $exception,
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); // HTTP status code 422
        }
        return response()->json(['message' => 'Dữ liệu đã được xóa thành công'], JsonResponse::HTTP_OK);
    }
}
