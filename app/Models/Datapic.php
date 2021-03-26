<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapic extends Model
{
    use HasFactory;
    protected $fillable = ['data_id', 'pic'];

    public function datas()
    {
        return $this->belongsTo(Data::class);
    }
}
