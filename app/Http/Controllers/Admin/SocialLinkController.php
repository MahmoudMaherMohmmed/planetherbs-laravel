<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\SocialLink;

class SocialLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = SocialLink::all();
        return view('admin.sociallinks.index', compact('items'));
    }

    public function create()
    {
        return view('admin.sociallinks.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'class' => 'required',
            'link' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = new SocialLink();
        $item->title = $request->title;
        $item->link = $request->link;
        $item->icon = $request->icon;
        $item->class = $request->class;
        $item->color = $request->color;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = SocialLink::findorfail($id);
        return view('admin.sociallinks.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'class' => 'required',
            'link' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = SocialLink::findorfail($id);
        $item->title = $request->title;
        $item->link = $request->link;
        $item->icon = $request->icon;
        $item->class = $request->class;
        $item->color = $request->color;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = SocialLink::findorfail($id);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
