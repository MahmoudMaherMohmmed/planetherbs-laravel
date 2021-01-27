<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Currency;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Currency::all();
        return view('admin.currencies.index', compact('items'));
    }

    public function create()
    {
        return view('admin.currencies.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'symbol' => 'required',
            'value' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Currency();
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->symbol = $request->symbol;
        $item->value = $request->value;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = Currency::findorfail($id);
        return view('admin.currencies.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'symbol' => 'required',
            'value' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = Currency::findorfail($id);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->symbol = $request->symbol;
        $item->value = $request->value;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = Currency::findorfail($id);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
