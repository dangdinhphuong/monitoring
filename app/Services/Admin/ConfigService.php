<?php

namespace App\Services\Admin;

use App\Models\config;

class ConfigService
{
    protected $config;
    protected $filepath = 'public/images/configs';

    public function __construct(config $config)
    {
        $this->config = $config;
    }

    /**
     * @return config
     */
    public function getConfigByKey($key): config
    {
        $config = $this->config->where('key', $key)->first();
        return $config ?? [] ;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function updateFileInStore($request, $config)
    {
        if (!empty($config)) {
            if (file_exists('storage/' . $config->value)) {
                unlink('storage/' . $config->value);
            }
        }
        $image = $request->file('value')->store('public/images/configs');
        return str_replace("public/", "", $image);
    }

    public function updateOrCreateData($data, $config)
    {
        $configData = [];
        if (!empty($config)) {
            // Nếu tồn tại, cập nhật bản ghi
            $configData = $config;
        } else {
            $configData = new Config;
        }
        $configData->key = $data['key'];
        $configData->type = $data['type'];
        $configData->group = $data['group'];
        $configData->value = $data['value'];
        $configData->save();

    }
}
