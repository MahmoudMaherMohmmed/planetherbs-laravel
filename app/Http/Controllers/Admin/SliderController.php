<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Slider::all();
        return view('admin.sliders.index', compact('items'));
    }

    public function create()
    {
        return view('admin.sliders.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Slider();
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->subtitle = langSting($request->subtitle_ar, $request->subtitle_en);
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
        $item = Slider::findorfail($id);
        return view('admin.sliders.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);


        $item = Slider::findorfail($id);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->subtitle = langSting($request->subtitle_ar, $request->subtitle_en);
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
        $item = Slider::findorfail($id);

        //delete image
        deleteImage($item->image);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
