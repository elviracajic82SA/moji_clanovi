<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['member_id','fee_plan_id','amount','due_date','paid_at','status'];
    protected $casts = ['due_date'=>'date','paid_at'=>'datetime'];

    public function member(){ return $this->belongsTo(Member::class); }
    public function feePlan(){ return $this->belongsTo(FeePlan::class); }
}
