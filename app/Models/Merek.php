<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function TipeMerek()
    {
        return $this->belongsTo(TipeMerek::class, 'tipe_id', 'id');
    }

}
