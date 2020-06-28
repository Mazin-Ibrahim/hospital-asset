<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\Asset;
use Auth;

class TransactionsController extends Controller
{
    public function toStock(Request $request,$id)
    {
    	// dd($request->all());
    	$transaction = new Transaction();
    	$asset       =  Asset::findOrFail($id);

    	$operation_type = $request->operation;
    	$quantity      =  $request->quantity;

    	if($operation_type == 1){

           $asset->stock = $asset->stock + $quantity;
    	}

        if($operation_type == 2){

           $asset->stock = $asset->stock - $quantity;
    	}

    	$transaction->date = $request->date;

    	$transaction->quantity = $quantity;

    	$transaction->operation = $operation_type;

    	$transaction->asset_id = $id;

    	$transaction->user_id  = Auth::user()->id;

    	$asset->save();

    	$transaction->save();

    	return  response()->json(['content' => $transaction, 'state' => 200]);
         


    }

    public function traceAsset($id)
    {
    	 // dd($id);
    	$transaction = Transaction::where('asset_id',$id)->first();

    	$transactions = Transaction::where('asset_id',$id)->get();
       	return view('asset.transaction')->withTransaction($transaction)->withTransactions($transactions);
    }
}
