<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeMerek extends Model
{
    use HasFactory;


    protected $guarded=['id'];
    public function merek(){
        return $this->belongsTo(Merek::class,'tipe_id');
    }
}
