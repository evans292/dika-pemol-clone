<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $dates = ['tanggal'];
    protected $fillable = ['user_id', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pics()
    {
        return $this->hasMany(Activitypic::class);
    }
}
