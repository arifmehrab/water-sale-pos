<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Index
    public function index()
    {
        $products = product::all();
        $stocks = stock::all();
        return view('Admin.stock.index', compact('products', 'stocks'));
    }

    // Store
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $stock      = stock::where('product_id', $product_id)->first();
        
        if ($stock) {
            if($product_id == $stock->product_id) {
                $stock->date       = $request->date;
                $stock->quantity   = $stock->quantity + $request->product_quantity;
                $stock->save();
                // Notification
                $notification = array(
                    'message'    => 'সংরক্ষিত হল',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $stock_store             = new stock();
            $stock_store->date       = $request->date;
            $stock_store->product_id = $product_id;
            $stock_store->quantity   = $request->product_quantity;
            $stock_store->save();
            // Notification
            $notification = array(
                'message'    => 'সংরক্ষিত হল',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $data = stock::find($id);
        return view('Admin.stock.edit',compact('data'));

    }

    //update
    public function update(Request $request,$id){
        $stock_update = stock::find($id);
        $stock_update->quantity= $request->	quantity;
        $stock_update->save();


        // Notification
        $notification = array(
            'message'    => 'Update Successfull',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.stock.index')->with($notification);
    }


}
