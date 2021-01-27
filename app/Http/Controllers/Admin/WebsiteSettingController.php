<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\WebsiteSetting;

class WebsiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = WebsiteSetting::all();
        return view('admin.websitesettings.index', compact('items'));
    }

    public function create()
    {
        return view('admin.websitesettings.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'sales_email' => 'required | email',
            'support_email' => 'required | email',
            'sales_phone' => 'required',
            'support_phone' => 'required',
            'image' => 'required | mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);

        $item = new WebsiteSetting();
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->address = langSting($request->address_ar, $request->address_en);
        $item->sales_email = $request->sales_email;
        $item->support_email = $request->support_email;
        $item->sales_phone = $request->sales_phone;
        $item->support_phone = $request->support_phone;
        $item->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('files/', $imageName);

                    $item->image = $imageName;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
            } else {
                return redirect()->back()->withErrors('This file is invalid.');
            }
        }


        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = WebsiteSetting::findorfail($id);
        return view('admin.websitesettings.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'sales_email' => 'required | email',
            'support_email' => 'required | email',
            'sales_phone' => 'required',
            'support_phone' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);


        $item = WebsiteSetting::findorfail($id);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->address = langSting($request->address_ar, $request->address_en);
        $item->sales_email = $request->sales_email;
        $item->support_email = $request->support_email;
        $item->sales_phone = $request->sales_phone;
        $item->support_phone = $request->support_phone;
        $item->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    //delete image
                    deleteImage($item->image);

                    //save new image
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('files/', $imageName);

                    $item->image = $imageName;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
            } else {
                return redirect()->back()->withErrors('This file is invalid.');
            }
        }

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = WebsiteSetting::findorfail($id);

        //delete image
        deleteImage($item->image);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
