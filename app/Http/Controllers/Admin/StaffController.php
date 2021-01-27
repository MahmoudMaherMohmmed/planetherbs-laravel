<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = User::all();
        return view('admin.staff.index', compact('items'));
    }

    public function create()
    {
        return view('admin.staff.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required | unique:users',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8 | confirmed',
            'phone' => 'required',
            'birthdate' => 'required',
            'gender' => 'required | not_in:-1',
            'country_id' => 'required | not_in:-1',
            'state_id' => 'required | not_in:-1',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);

        $item = new User();
        $item->code = Str::random(25);
        $item->first_name = $request->first_name;
        $item->last_name = $request->last_name;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = bcrypt($request->password);
        $item->phone = $request->phone;
        $item->mobile = $request->mobile;
        $item->birthdate = $request->birthdate;
        $item->gender = $request->gender;
        $item->country_id = $request->country_id;
        $item->state_id = $request->state_id;
        $item->address = $request->address;
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
        $item = User::findorfail($id);
        return view('admin.staff.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'birthdate' => 'required',
            'gender' => 'required | not_in:-1',
            'country_id' => 'required | not_in:-1',
            'state_id' => 'required | not_in:-1',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);


        $item = User::findorfail($id);
        $item->first_name = $request->first_name;
        $item->last_name = $request->last_name;
        $item->phone = $request->phone;
        $item->mobile = $request->mobile;
        $item->birthdate = $request->birthdate;
        $item->gender = $request->gender;
        $item->country_id = $request->country_id;
        $item->state_id = $request->state_id;
        $item->address = $request->address;
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
        $item = User::findorfail($id);

        //delete image
        deleteImage($item->image);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
