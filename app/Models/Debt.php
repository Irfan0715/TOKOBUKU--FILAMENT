<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Debt extends Model
{
    protected $fillable = ['member_id','jumlah_hutang','tanggal','keterangan'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
