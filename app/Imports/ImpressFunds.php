<?php

namespace App\Imports;

use App\Models\History;
use App\Models\ImpressFund;
use App\Models\TagPartner;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class ImpressFunds implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $impress=new ImpressFund();
        $impress->id_pm=$row[0];
        $impress->periode=$row[1];
        $impress->bulan=$row[2];
        $impress->teritory=$row[3];
        $impress->box=$row[4];
        $impress->status='IN';
        $impress->save();

        $history=new History();
        $history->status='Arsip Masuk';
        $history->user_id=Auth::id();
        $history->archive_id=$row[0];
        $history->save();
    }
}
