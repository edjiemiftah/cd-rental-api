<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Stock;

class StockController extends Controller
{
    // List of all cd collection's stocks    
    public function index() {
        return response()->json(['success' => true, 'statusCode' => 200, 'data' => Stock::all()]);
    }

    // Insert new stock into collections
    public function store(Request $request) {
        $stock = new Stock();
        $stock->title       = $request->input('title');
        $stock->rate        = $request->input('rate');
        $stock->category    = $request->input('category');
        $stock->quantity    = $request->input('quantity');
        
        try {
            $stock->save();
            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'New stock has been saved']);
        } catch(Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 400, 'message' => 'Failed to save new stock. ' . $e]);
        }
    }

    // Show specific cd
    public function show($id) {
        return response()->json(['success' => true, 'statusCode' => 200, 'data' => Stock::findOrFail($id)]);
    }

    // Update stock
    public function update($id, Request $request) {
        $stock = Stock::find($id);
        $stock->title       = $request->input('title');
        $stock->rate        = $request->input('rate');
        $stock->category    = $request->input('category');
        $stock->quantity    = $request->input('quantity');
        
        try {
            $stock->save();
            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Stock with ID '.$id.' has been updated']);
        } catch(Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 400, 'message' => 'Failed to update stock. ' . $e]);
        }
    }
}
