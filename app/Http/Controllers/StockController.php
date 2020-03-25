<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Stock;
use Carbon\Carbon;
use DB;

class StockController extends Controller
{
    // List of all cd collection's stocks    
    public function index() {
        return response()->json(['status' => 'success', 'data' => Stock::all()], 200);
    }

    // Insert new stock into collections
    public function store(Request $request) {
        $this->validate($request, [
            'title'     => 'required',
            'rate'      => 'required',
            'category'  => 'required',
            'quantity'  => 'required'
        ]);

        $stock = new Stock();
        $stock->title       = $request->input('title');
        $stock->rate        = $request->input('rate');
        $stock->category    = $request->input('category');
        $stock->quantity    = $request->input('quantity');
        $stock->created_at  = Carbon::now();
        
        try {
            $stock->save();
            return response()->json(['status' => 'success', 'message' => 'New stock has been saved'], 200);
        } catch(Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to save new stock. ' . $e], 400);
        }
    }

    // Show specific cd
    public function show($id) {
        return response()->json(['status' => 'success', 'data' => Stock::findOrFail($id)], 200);
    }

    // Update stock
    public function update($id, Request $request) {
        $this->validate($request, [
            'quantity'  => 'required'
        ]);
        $stock = Stock::find($id);
        $stock->quantity  = $request->input('quantity');
        $stock->updated_at  = Carbon::now();
        
        try {
            $stock->save();
            return response()->json(['status' => 'success', 'message' => 'Stock with ID '.$id.' has been updated'], 200);
        } catch(Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to update stock. ' . $e], 400);
        }
    }
}
