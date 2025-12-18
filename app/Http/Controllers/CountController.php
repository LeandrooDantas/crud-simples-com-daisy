<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Count;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CountController extends Controller
{
    public function create()
    {
        return view('counts');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name'  => ['required', 'string', 'max:255', 'unique:counts,product_name'],
            'quantity' => ['required', 'integer', 'min:1'],
            'category' => ['required', 'string', 'max:50'],
            'sector' => ['required', 'string', 'max:1'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $count = Count::create([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'sector' => $request->sector,
            ]);
        return redirect()->route('counts');
    }

    public function index()
    {
        $counts = Count::all();
        return view('list_counts', compact('counts'));
    }

    public function destroy(Count $id)
    {
        $id->delete();
        return redirect()->route('listcount');
    }

    public function update(Count $id)
    {
        $count = $id;
        return view('update', compact('count'));
    }

    public function updatesave(Request $request, Count $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer|min:1',
            'category' => 'nullable|string|max:50',
            'sector' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) :
            return response()->json(['error' => $validator->errors()], 400);
        endif;

        $insertData = $request->only([
            'product_name',
            'quantity',
            'category',
            'sector',
        ]);

        $id->update($insertData);

        return redirect()->route('listcount');
    }
}


