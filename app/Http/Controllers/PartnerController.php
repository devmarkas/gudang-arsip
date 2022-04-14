<?php

namespace App\Http\Controllers;

use App\Imports\ImpressFunds;
use App\Models\Counter;
use App\Models\ImpressFund;
use App\Models\Archive;
use App\Models\Box;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PartnerController extends Controller
{
    public function index()
    {
        $data['archives'] = Archive::where('type', 'TM')->get();
        $data['boxes'] = Box::where('unit', 'TM')->get();
        return view('admin.kelola-arsip.tag-mitra.index', $data);
    }

    public function save(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'periode' => 'required',
            'bulan' => 'required',
            'teritory' => 'required',
            'pekerjaan' => 'required',
            'box' => 'required',
        ]);
        $id_pm = $this->id_archive($request->periode);
        $impress = new Archive();
        $impress->id_pm = $id_pm;
        $impress->pekerjaan = $request->pekerjaan;
        $impress->periode = $request->periode;
        $impress->bulan = $request->bulan;
        $impress->teritory = $request->teritory;
        $impress->box = $request->box;
        $impress->status = 'IN';
        $impress->type = 'TM';
        $impress->save();

        $history = new History();
        $history->status = 'Arsip Masuk';
        $history->user_id = Auth::id();
        $history->archive_id = $id_pm;
        $history->save();

        return redirect()->back()->with('barcode', json_encode([$id_pm, $request->bulan, $request->pekerjaan, $request->teritory, $request->box]));
    }

    public function id_archive($year)
    {
        $last_id = DB::table('archives')->max('id');
        if (!$last_id) {
            $last_id = $year . '000000' . $last_id;
        } else {
            $last_id = DB::table('archives')->select('id_pm')->where('id', $last_id)->pluck('id_pm')->first();
            $last_id = $year . substr($last_id, 4, 6);
        }
        return $last_id += 1;
    }

    public function out_archive($id)
    {
        if (!$id == 0) {
            $archives = Archive::where('id_pm', 'LIKE', '%' . $id . '%')->where('type', 'TM')->get();
        } else {
            $archives = Archive::where('type', 'TM')->get();
        }
        return response($archives);
    }

    public function delete_partner($id)
    {
        $archive = new Archive();
        $archive = Archive::where('id_pm', $id)->first();
        $archive->delete();
        return response($archive);
    }

    public function import_tag_partner(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        if (request()->file('file')) {
            $archives = Excel::toArray(new ImpressFunds, request()->file('file'));
            if ($archives[0] != null) {
                $i = 1;
                for ($n = 0; $n < count($archives[0]) - 1; $n++) {
                    $check_archive = Archive::where('id_pm', $archives[0][$i][0])->first();
                    if ($archives[0][$i][0] && $check_archive == null) {
                        $data[$n] = [
                            'id_pm' => $archives[0][$i][0],
                            'periode' => $archives[0][$i][1],
                            'teritory' => $archives[0][$i][3],
                            'box' => $archives[0][$i][4],
                        ];
                        $impress = new Archive();
                        $impress->id_pm = $archives[0][$i][0];
                        $impress->pekerjaan = $archives[0][$i][1];
                        $impress->periode = $archives[0][$i][2];
                        $impress->bulan = $archives[0][$i][3];
                        $impress->teritory = $archives[0][$i][4];
                        $impress->box = $archives[0][$i][5];
                        $impress->status = 'IN';
                        $impress->type = 'TM';
                        $impress->save();

                        $history = new History();
                        $history->status = 'Arsip Masuk';
                        $history->user_id = Auth::id();
                        $history->archive_id = $archives[0][$i][0];
                        $history->save();
                    }
                    $i++;
                }
                return redirect()->route('tag_mitra.index')->with('succes_import', json_encode($data));
            } else {
                return redirect()->route('tag_mitra.index')->with('error_import', 'Import Data Excel Kosong');
            }
        } else {
            return redirect()->route('tag_mitra.index')->with('error_import', 'File Excel Required');
        }
    }

    public function cari_tag_partner($query)
    {
        $archives = DB::table('archives')
            ->where('type', 'TM')
            ->where('id_pm', 'LIKE', '%' . $query . '%')
            ->orWhere('box', 'LIKE', '%' . $query . '%')
            ->get();
        return response($archives);
    }
}
