<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produck(){
        return $this->belongsTo(Produck::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
