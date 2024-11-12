<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemateri extends Model
{
    protected $table = 'pemateris';
    protected $fillable = 
    [
        'nama',
        'gender',
        'pendidikan',
        'pekerjaan',
    ];

    public function webinar()
    {
        return $this->hasMany(Webinar::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
