<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal',
        'absen_pagi',
        'latitude',
        'latitude_sore',
        'longitude',
        'longitude_sore',
        'closing',
        'pic'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
