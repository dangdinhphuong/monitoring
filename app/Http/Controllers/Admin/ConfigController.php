<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config;
use App\Services\Admin\ConfigService;
use App\Http\Requests\Admin\ConfigRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
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

    public function store(ConfigRequest $request)
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

    public function updateConfig(Request $request, $id)
    {
        $config = config::first();
        $this->validate(request(), [
            'key' => 'required',
            'type'    => 'required',
            'group' => 'required',
            'value' => 'nullable',
        ]);

        $data = $request->all();
        unset($data["_token"]);

        $config = $this->configService->getConfigByKey($data['key']);
        dd($config);
        if ($request->hasFile('value')) {
            $image = $this->configService->updateFileInStore($request, $config);
            unset($data['value']);
            $data['value'] = $image;
        }
        $this->configService->updateOrCreateData($data, $config);
        //        Config::updateOrInsert(['key' => $data['key']], $data);
        return response()->json(['message' => 'Cập nhật thông tin thành công'], 200);
    }
}
