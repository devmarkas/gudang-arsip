<?php

namespace App\Http\Controllers;

use App\Imports\ImpressFunds;
use App\Models\Counter;
use App\Models\File;
use App\Models\History;
use App\Models\Archive;
use App\Models\Box;
use App\Models\TagPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\Constraint\Count;

class ArsipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function impress_fund()
    {
        $data['archives']=Archive::where('type','IF')->get();
        $data['boxes']=Box::where('unit','IF')->get();

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
        $archive=Archive::where('id_pm',$id)->first();
        return response($archive);

    }

    public function archive_history($id)
    {
        $histories=DB::table('histories')->select('histories.*','users.name')->where('archive_id',$id)->leftJoin('users','users.id','histories.user_id')->get();
        return response($histories);
    }

    public function save_impress_fund(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'tahun'=>'required',
            'bulan'=>'required',
            'teritory'=>'required',
            'box'=>'required',
        ]);
        $id_pm=$this->id_archive($request->tahun);
        $check_archive=Archive::where('id_pm',$id_pm)->first();
        if($check_archive==null){
            $impress=new Archive();
            $impress->id_pm=$id_pm;
            $impress->periode=$request->tahun;
            $impress->bulan=$request->bulan;
            $impress->teritory=$request->teritory;
            $impress->box=$request->box;
            $impress->status='IN';
            $impress->type='IF';
            $impress->save();

            $history=new History();
            $history->status='Arsip Masuk';
            $history->user_id=Auth::id();
            $history->archive_id=$id_pm;
            $history->save();
            return redirect()->back()->with('barcode',json_encode([$id_pm,$request->bulan,$request->teritory,$request->box]));
        }else{
            return redirect()->back()->with('error_import','Data Duplikasi');
        }
        
    }
    public function id_archive($year)
    {
        $last_id=DB::table('archives')->max('id');
        if(!$last_id){
            $last_id=$year.'000000'.$last_id;
        }else{
            $last_id=DB::table('archives')->select('id_pm')->where('id',$last_id)->pluck('id_pm')->first();
            $last_id=$year.substr($last_id,4,6);
        }
        return $last_id+=1;
    }

    public function archive_save(Request $request)
    {
        $request->validate([
            'file'=>'required|file',
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $path = public_path().'/template/img/archive';
        $file_name=time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move($path,$file_name);

        $file=new File();
        $file->name=$file_name;
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
        $archives=Archive::where('id_pm','LIKE','%'.$id.'%')->where('type','IF')->get();
        return response($archives);
    }

    public function scan_barcode($id)
    {
        $archives=Archive::where('id_pm','LIKE','%'.$id.'%')->where('type','IF')->get();
        return response($archives);
    }

    public function take_out_archive($id){
        date_default_timezone_set('Asia/Jakarta');

        $impress=new Archive();
        $impress=Archive::where('id_pm',$id)->first();
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
        date_default_timezone_set('Asia/Jakarta');
        $archive=new Archive();
        $archive=Archive::where('id_pm',$id)->first();
        $archive->delete();
        return response($archive);
    }

    public function filter_impress_fund(Request $request)
    {
        
        $archives=Archive::where(function ($query) use ($request) {
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
            if($request->pekerjaan != ""){
                $query->where('pekerjaan','LIKE','%'. $request->pekerjaan.'%');
            }
        })
        ->where('type',$request->type)
        ->get();
        return response($archives);
    }

    public function import_impress_fund(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        if(request()->file('file')){
            $archives = Excel::toArray(new ImpressFunds, request()->file('file'));
            if($archives[0]!=null){
                $i=1;
                for ($n=0; $n < count($archives[0])-1; $n++) { 
                    $check_archive=Archive::where('id_pm',$archives[0][$i][0])->first();
                    if($archives[0][$i][0]&&$check_archive==null){
                        $data[$n]=[
                            'id_pm'=>$archives[0][$i][0],
                            'periode'=>$archives[0][$i][1],
                            'teritory'=>$archives[0][$i][3],
                            'box'=>$archives[0][$i][4],
                        ];
                        $impress=new Archive();
                        $impress->id_pm=$archives[0][$i][0];
                        $impress->periode=$archives[0][$i][1];
                        $impress->bulan=$archives[0][$i][2];
                        $impress->teritory=$archives[0][$i][3];
                        $impress->box=$archives[0][$i][4];
                        $impress->status='IN';
                        $impress->type='IF';
                        $impress->save();
                
                        $history=new History();
                        $history->status='Arsip Masuk';
                        $history->user_id=Auth::id();
                        $history->archive_id=$archives[0][$i][0];
                        $history->save();
                    }
                    $i++;
                }
                return redirect()->route('impress_fund.index')->with('succes_import',json_encode($data));
            }else{
                return redirect()->route('impress_fund.index')->with('error_import','Import Data Excel Kosong');
            }
        }else{
            return redirect()->route('impress_fund.index')->with('error_import','File Excel Required');
        }

    }

    public function cari_impress_fund($query)
    {
        $archives=DB::table('archives')
        ->where('type','IF')
        ->where('id_pm','LIKE','%'.$query)->get();
        return response($archives);
    }
}
