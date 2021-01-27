<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\State;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = State::all();
        return view('admin.states.index', compact('items'));
    }

    public function create()
    {
        return view('admin.states.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required| not_in:-1',
            'status' => 'required | not_in:-1'
        ]);

        $item = new State();
        $item->name = $request->name;
        $item->country_id = $request->country_id;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = State::findorfail($id);
        return view('admin.states.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required| not_in:-1',
            'status' => 'required | not_in:-1'
        ]);

        $item = State::findorfail($id);
        $item->name = $request->name;
        $item->country_id = $request->country_id;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = State::findorfail($id);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }

    public function getStates(Request $request)
    {
        $country_id = $request->country_id;

        if (isset($country_id) && $country_id != null) {
            $states = State::where('country_id', $country_id)->get(['id', 'name']);
            if (isset($states) && $states != null) {
                $data['status'] = 200;
                $data['states'] = $states;
                $data['message'] = "Data Returned Successfully.";
            } else {
                $data['status'] = -1;
                $data['states'] = [];
                $data['message'] = "No States To Return.";
            }
        } else {
            $data['status'] = -1;
            $data['states'] = [];
            $data['message'] = "Too Few Arguments.";
        }

        return json_encode($data);
    }
}
