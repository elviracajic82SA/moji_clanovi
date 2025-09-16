<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeePlan extends Model
{
    protected $fillable = ['name','amount','period'];
    public function payments(){ return $this->hasMany(Payment::class); }
}
