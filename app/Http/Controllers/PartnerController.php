<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\ImpressFund;
use App\Models\TagPartner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $data['archives']=TagPartner::all();
        return view('admin.kelola-arsip.tag-mitra.index',$data);
    }

    public function save(Request $request)
    {
        $request->validate(['*'=>'required']);
        $id_pm = sprintf("%6d", mt_rand(1, 999999));
        $id_pm=$this->id_archive($request->tahun);
        $impress=new TagPartner();
        $impress->id_pm=$id_pm;
        $impress->pekerjaan=$request->pekerjaan;
        $impress->periode=$request->periode;
        $impress->bulan=$request->bulan;
        $impress->teritory=$request->teritory;
        $impress->box=$request->box;
        $impress->status='IN';
        $impress->save();
        return redirect()->back()->with('barcode',json_encode([$id_pm,$request->bulan,$request->pekerjaan,$request->teritory,$request->box]));
    }

    public function id_archive($year)
    {
        $last_counter=Counter::select('counter')->pluck('counter')->first();
        $counter=new Counter();
        $counter=Counter::first();
        $counter->counter=$last_counter+=1;
        $counter->save();
        return $year.sprintf("%05d", $last_counter);
    }

    public function out_archive($id){
        $archives=TagPartner::where('id_pm','LIKE','%'.$id.'%')->get();
        return response($archives);
    }

    public function delete_partner($id)
    {
        $archive=new TagPartner();
        $archive=TagPartner::where('id_pm',$id)->first();
        $archive->delete();
        return response($archive);
    }
}
