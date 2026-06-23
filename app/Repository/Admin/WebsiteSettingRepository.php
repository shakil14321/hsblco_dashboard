<?php

namespace App\Repository\Admin;

use App\Models\WebsiteSetting;

class WebsiteSettingRepository
{
    public function first()
    {
        return WebsiteSetting::firstOrCreate([]);
    }

    public function update($setting, array $data)
    {
        return $setting->update($data);
    }
}
