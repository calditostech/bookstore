<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'active' => 'nullable|string|in:on',
        ]);

        $store = new Store();
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->active = $request->has('active');
        $store->save();

        return redirect()->route('stores.index')->with('success', 'Store added successfully!');
    }

    public function create()
    {
        return view('stores.create');
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'active' => 'nullable|string|in:on',
        ]);

        $store = Store::findOrFail($id);
        $store->update($request->all());
        return redirect()->route('stores.index')->with('success', 'Store a updated!');
    }

    public function destroy($id)
    {
        Store::findOrFail($id)->delete();
        return redirect()->route('stores.index')->with('success', 'Store a deleted!');
    }
}
