<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\CompanySetting;

class SettingController extends Controller
{
    public function index()
    {   $data['setting'] = CompanySetting::first();
        return view('settings.index', $data);
    }
    public function update(SettingRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logos'), $filename);
            $data['logo'] = $filename;
        }
        $setting = CompanySetting::updateOrCreate(
            ['id' => 1],
            [
            'company_name' => $data['company_name'],
            'owner_name' => $data['owner_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
             'logo'    => $data['logo'] ?? CompanySetting::find(1)?->logo,
        ]);
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}