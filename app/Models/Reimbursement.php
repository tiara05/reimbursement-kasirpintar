<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_reimbursement',
        'deskripsi',
        'file_pendukung',
    ];
}
