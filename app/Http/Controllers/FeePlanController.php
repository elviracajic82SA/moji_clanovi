<?php

namespace App\Http\Controllers;

use App\Models\FeePlan;
use Illuminate\Http\Request;

class FeePlanController extends Controller
{
    public function index(){ $fee_plans = FeePlan::latest()->paginate(10); return view('fee_plans.index', compact('fee_plans')); }
    public function create(){ return view('fee_plans.create'); }

    public function store(Request $r){
        $data = $r->validate([
            'name'=>'required|max:100',
            'amount'=>'required|numeric|min:0',
            'period'=>'required|in:monthly,yearly'
        ]);
        FeePlan::create($data);
        return redirect()->route('fee-plans.index')->with('ok','Plan dodat.');
    }

    public function edit(FeePlan $fee_plan){ return view('fee_plans.edit', compact('fee_plan')); }

    public function update(Request $r, FeePlan $fee_plan){
        $data = $r->validate([
            'name'=>'required|max:100',
            'amount'=>'required|numeric|min:0',
            'period'=>'required|in:monthly,yearly'
        ]);
        $fee_plan->update($data);
        return back()->with('ok','Plan ažuriran.');
    }

    public function destroy(FeePlan $fee_plan){
        $fee_plan->delete();
        return redirect()->route('fee-plans.index')->with('ok','Plan obrisan.');
    }
}
