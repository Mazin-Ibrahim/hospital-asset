<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AssetsRequest;

use App\Asset;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::where('hospital_id',auth()->user()->hospital_id)->get();

        // return response()->json(['content' => $assets,'state' => 200]);
        return $assets;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.asset');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetsRequest $request)
    {


        $asset = new Asset();

        $asset->name  = $request->name;
        $asset->descr  = $request->descr;
        $asset->stock = $request->stock;
        $asset->danger_level = $request->danger_level;
        $asset->hospital_id = auth()->user()->hospital_id;

        $asset->save();
        return response()->json(['content' => $asset, 'state' => 200]);
    }

        public function update(AssetsRequest $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->name = $request->name;
        $asset->stock = $request->stock;
        $asset->danger_level = $request->danger_level;
        $asset->descr = $request->descr;

        $asset->save();

        return $asset;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
