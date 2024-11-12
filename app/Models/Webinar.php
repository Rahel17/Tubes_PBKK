<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $table = 'webinars';

    protected $fillable = 
    [
        'pemateri_id',
        'judul',
        'deksripsi',
        'lokasi',
        'tanggal',
        'biaya',
        'status',
    ];

    public function pemateri()
    {
        return $this->belongsTo(Pemateri::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
