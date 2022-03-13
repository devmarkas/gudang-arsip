<?php

namespace App\Imports;

use App\Models\Archive;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class TagMitraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $impress=new Archive();
        $impress->id_pm=$row[0];
        $impress->type='TM';
        $impress->pekerjaan=$row[1];
        $impress->periode=$row[2];
        $impress->bulan=$row[3];
        $impress->teritory=$row[4];
        $impress->box=$row[5];
        $impress->status='IN';
        $impress->save();

        $history=new History();
        $history->status='Arsip Masuk';
        $history->user_id=Auth::id();
        $history->archive_id=$row[0];
        $history->save();
    }
}
