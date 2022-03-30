<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['boxes']=Box::all();
        foreach($data['boxes'] as $box){
            $data['archive'][]=Archive::where('box',$box->nama)->count();
        }

        // dd($data);
        return view('admin.box.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'type'=>'required',
            'subunit'=>'required',
            'kuota'=>'required',
        ]);
        $box=new Box();
        $box->nama=$request->nama;
        $box->unit=$request->type;
        $box->subunit=$request->subunit;
        $box->kuota=$request->kuota;
        $box->save();
        return redirect()->route('box.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $box=Box::where('nama',$id)->first();
        $box->delete();
    }
}
