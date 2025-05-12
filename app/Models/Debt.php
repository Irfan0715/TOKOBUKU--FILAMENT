<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = ['nama_pelanggan','jumlah_hutang','tanggal','keterangan'];

    public function member()
{
    return $this->belongsTo(Member::class);
}
}
