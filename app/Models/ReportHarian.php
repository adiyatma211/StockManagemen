<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHarian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function TipeMerek()
    {
        return $this->belongsTo(TipeMerek::class, 'tipemerek_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
