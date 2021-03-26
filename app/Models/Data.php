<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $dates = ['tanggal'];
    protected $fillable = [
        'no_rek',
        'tanggal',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pics()
    {
        return $this->hasMany(Datapic::class);
    }
}
