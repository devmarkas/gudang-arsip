<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpressFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pm',
        'periode',
        'bulan',
        'teritory',
        'box',
    ];
}
