<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\AddBank;
use App\Models\bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\shopcost;

class ShopcostController extends Controller
{
    //
    public function index(){
        $shopcost_data = shopcost::latest()->paginate(5);
        return view('Admin.shopcost.index',compact('shopcost_data'));
    }

    //cost add
    public function costadd(Request $request){
        $shopcost_add = new shopcost();
        $shopcost_add->user_name = Auth::user()->name;
        $shopcost_add->date = $request->date;
        $shopcost_add->cost_details = $request->cost_details;
        $shopcost_add->cost_amount = $request->cost_amount;
        $shopcost_add->save();


          // Notification
          $notification = array(
            'message'    => 'Added Successfull',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    //edit
    public function costedit($id){
        $shopcost_data = shopcost::find($id);
        return view('Admin.shopcost.edit',compact('shopcost_data'));

    }

    //update
    public function update(Request $request,$id){
        $shopcost_update = shopcost::find($id);
        $shopcost_update->user_name = Auth::user()->name;
        $shopcost_update->cost_details= $request->cost_details;
        $shopcost_update->cost_amount = $request->cost_amount;
        $shopcost_update->date = $request->date;
        $shopcost_update->save();

        $update_amount_bank = bank::where('cost_id', $id)->first();
        $update_amount_bank->user_name = Auth::user()->name;
        $update_amount_bank->bank_name = $request->cost_details;
        $update_amount_bank->bank_amount = $request->cost_amount;
        $update_amount_bank->date = $request->date;
        $update_amount_bank->save();


        // Notification
        $notification = array(
            'message'    => 'Update Successfull',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shopcost.index')->with($notification);
    }

    //
    public function bank(){
        $bank_list       = AddBank::all();
        return view('Admin.shopcost.bank',compact('bank_list'));
    }

    //bank amount add
    public function costbankamount(Request $request){
        $add_amount = new shopcost();
        $add_amount->user_name = Auth::user()->name;
        $add_amount->cost_details = $request->bank_name;
        $add_amount->cost_amount = $request->cost_amount;
        $add_amount->date = $request->date;
        $add_amount->save();

        $add_amount_bank = new bank();
        $add_amount_bank->user_name = Auth::user()->name;
        $add_amount_bank->bank_name = $request->bank_name;
        $add_amount_bank->bank_amount = $request->cost_amount;
        $add_amount_bank->cost_id = $add_amount->id;
        $add_amount_bank->date = $request->date;
        $add_amount_bank->save();


        $notification = array(
            'message'    => 'Added Successfull',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    // Sell Delete
    public function costDelete($id)
    {
       $cost_delete = shopcost::findOrFail($id);
       $cost_delete->delete();
       bank::where('cost_id', $cost_delete->id)->delete();

       // Notification
       $notification = array(
        'message'    => ' Deleted Successfully',
        'alert-type' => 'success',
      );
      return redirect()->back()->with($notification); 

    }




}
