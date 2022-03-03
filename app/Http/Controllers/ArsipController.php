<?php

namespace App\Http\Controllers;

use App\Imports\ImpressFunds;
use App\Models\File;
use App\Models\History;
use App\Models\ImpressFund;
use App\Models\TagPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ArsipController extends Controller
{

    public function impress_fund()
    {
        $data['archives']=ImpressFund::all();
        // dd($data);
        return view('admin.kelola-arsip.impress-fund.index',$data);
    }

    public function impress_fund_detail($id)
    {
        $files=File::where('archive_id',$id)->get();
        return response($files);
    }

    public function detail($id)
    {
        $archive=ImpressFund::where('id_pm',$id)->first();
        return response($archive);

    }

    public function archive_history($id)
    {
        $histories=DB::table('histories')->select('histories.*','users.name')->where('archive_id',$id)->leftJoin('users','users.id','histories.user_id')->get();
        return response($histories);
    }

    public function save_impress_fund(Request $request)
    {
        $request->validate([
            'tahun'=>'required',
            'bulan'=>'required',
            'teritory'=>'required',
            'box'=>'required',
        ]);
        $id_pm = sprintf("%6d", mt_rand(1, 999999));
        $id_pm=$this->cek_zero($id_pm);
        $impress=new ImpressFund();
        $impress->id_pm=$id_pm;
        $impress->periode=$request->tahun;
        $impress->bulan=$request->bulan;
        $impress->teritory=$request->teritory;
        $impress->box=$request->box;
        $impress->status='IN';
        $impress->save();

        $history=new History();
        $history->status='Arsip Masuk';
        $history->user_id=Auth::id();
        $history->archive_id=$id_pm;
        $history->save();

        return redirect()->back()->with('barcode',json_encode([$id_pm,$request->bulan,$request->teritory,$request->box]));
        
    }
    public function cek_zero($num)
    {
        $cek_db=ImpressFund::where('id_pm',$num)->first();
        $cek_db2=TagPartner::where('id_pm',$num)->first();
        if(substr($num,0,1)!=0&&$cek_db==null&&$cek_db2==null){
            return $num;
        }else{
            $num=sprintf("%6d", mt_rand(1, 999999));
            $this->cek_zero($num);
        }
    }

    public function archive_save(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'file'=>'required|file',
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $path = public_path().'/template/img/archive';
        $file_name=time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move($path,$file_name);

        $file=new File();
        $file->name=$request->name;
        $file->file=$file_name;
        $file->user_id=Auth::id();
        $file->archive_id=$request->archive_id;
        $file->save();

        $history=new History();
        $history->status='Arsip Masuk';
        $history->user_id=Auth::id();
        $history->archive_id=$request->archive_id;
        $history->save();
        return redirect()->back();


    }

    public function out_archive($id){
        $archives=ImpressFund::where('id_pm','LIKE','%'.$id.'%')->get();
        return response($archives);
    }

    public function take_out_archive($id){

        $impress=new ImpressFund();
        $impress=ImpressFund::where('id_pm',$id)->first();
        $impress->status='OUT';
        $impress->save();

        $history=new History();
        $history->status='Arsip Keluar';
        $history->user_id=Auth::id();
        $history->archive_id=$id;
        $history->save();
        return response($history);

    }

    public function delete_impress($id)
    {
        $archive=new ImpressFund();
        $archive=ImpressFund::where('id_pm',$id)->first();
        $archive->delete();
        return response($archive);
    }

    public function filter_impress_fund(Request $request)
    {
        $archives=ImpressFund::where(function ($query) use ($request) {
            if ($request->bulan != "") {
                $query->where('bulan', $request->bulan);
            }
            if($request->tahun != ""){
                $query->where('periode', $request->tahun);
            }
            if($request->teritory != ""){
                $query->where('teritory', $request->teritory);
            }
            if($request->box != ""){
                $query->where('box', $request->box);
            }
        })
        ->get();
        return response($archives);
    }

    public function import_impress_fund(Request $request)
    {
        if(request()->file('file')){
            $archives = Excel::toArray(new ImpressFunds, request()->file('file'));
            // $archives[0][1][0]
            if($archives[0]!=null){
                $i=1;
                for ($n=0; $n < count($archives[0])-1; $n++) { 
                    $check_archive=ImpressFund::where('id_pm')->where('id_pm',$archives[0][$i][0])->first();
                    if($archives[0][$i][0]&&$check_archive==null){
                        $impress=new ImpressFund();
                        $impress->id_pm=$archives[0][$i][0];
                        $impress->periode=$archives[0][$i][1];
                        $impress->bulan=$archives[0][$i][2];
                        $impress->teritory=$archives[0][$i][3];
                        $impress->box=$archives[0][$i][4];
                        $impress->status='IN';
                        $impress->save();
                
                        $history=new History();
                        $history->status='Arsip Masuk';
                        $history->user_id=Auth::id();
                        $history->archive_id=$archives[0][$i][0];
                        $history->save();
                    }
                    $i++;
                }
                return redirect()->route('impress_fund.index')->with('succes_import','Sukses Import Data Excel');
            }else{
                return redirect()->route('impress_fund.index')->with('succes_import','Sukses Import Data Excel');
            }
        }else{
            return redirect()->route('impress_fund.index')->with('succes_import','Sukses Import Data Excel');
        }

    }

    public function cari_impress_fund($query)
    {
        $archives=DB::table('impress_funds')
        ->where('id_pm','LIKE','%'.$query.'%')
        ->orWhere('periode','LIKE','%'.$query.'%')
        ->orWhere('bulan','LIKE','%'.$query.'%')
        ->orWhere('teritory','LIKE','%'.$query.'%')
        ->orWhere('box','LIKE','%'.$query.'%')->get();
        return response($archives);
    }
}
