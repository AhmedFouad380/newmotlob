<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function Settings()
    {
        $settings = Setting::findOrFail(1);

        return view('admin.setting.public_setting', compact('settings'));
    }

    public function editSettings(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'logo' => 'nullable|image',
            'phone' => 'required',
            'email' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'private_descripition' => 'required',
            'employment_description' => 'required',
        ]);

        $settings = Setting::findOrFail(1);

        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->employment_description	 = $request->employment_description	;
        $settings->private_descripition	 = $request->private_descripition	;
        $settings->twitter = $request->twitter;
        $settings->instgram = $request->instagram;
        $settings->youtube = $request->youtube;
        $settings->facebook = $request->facebook;
        $settings->save();
        return redirect(url('public_setting'))->with('message', 'تم التعديل بنجاح');
    }
}
