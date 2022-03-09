<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\ImpressFund;
use App\Models\TagPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $id_pm=$this->id_archive();
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

    public function id_archive()
    {
        $last_id=DB::table('tag_partners')->select('id_pm')->latest('created_at')->pluck('id_pm')->first();
        return $last_id+=1;
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
