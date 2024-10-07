<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();
		return view('currencies.index', compact(['currencies'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currency = new Currency;
		$currency->fill($request->all());
		$currency->save();
		return redirect(route('currencies.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $currency = Currency::findOrFail($id);
		return view('currencies.show', compact(['currency']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
		return view('currencies.edit', compact(['currency']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);		
					
		$currency->fill($request->all());
		$currency->save();
		return redirect(route('currencies.index'))->with(['success'=>'Currency updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Currency::findOrFail($id)->delete();
		return redirect(route('currencies.index'))->with('success','1 Record deleted successfully!');
    }
}
