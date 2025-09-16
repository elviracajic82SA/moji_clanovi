<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['first_name','last_name','email','phone','status'];
    public function payments(){ return $this->hasMany(Payment::class); }
    public function getFullNameAttribute(){ return "{$this->first_name} {$this->last_name}"; }
}
