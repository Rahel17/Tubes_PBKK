<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = 
    [
        'tanggal',
        'user_id', 
        'pemateri_id', 
        'webinar_id', 
        'bukti_pembayaran', 
    ];

 
    public function pemateri()
    {
        return $this->belongsTo(Pemateri::class);
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
