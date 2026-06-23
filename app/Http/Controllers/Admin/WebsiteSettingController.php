<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebsiteSettingRequest;
use App\Repository\Admin\WebsiteSettingRepository;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    public function __construct(
        protected WebsiteSettingRepository $repository
    ) {}

    public function edit()
    {
        $setting = $this->repository->first();

        return view(
            'admin.website-settings.edit',
            compact('setting')
        );
    }

    public function update(WebsiteSettingRequest $request)
    {
        $setting = $this->repository->first();

        $data = $request->validated();

        if ($request->hasFile('logo')) {

            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('website-settings', 'public');
        }

        if ($request->hasFile('favicon')) {

            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = $request
                ->file('favicon')
                ->store('website-settings', 'public');
        }

        $this->repository->update($setting, $data);

        return back()->with(
            'success',
            'Website settings updated successfully.'
        );
    }
}
