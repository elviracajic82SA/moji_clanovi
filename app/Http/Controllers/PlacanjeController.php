<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Member;
use App\Models\FeePlan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['member','feePlan'])->latest()->paginate(10);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create', [
            'members'=> Member::orderBy('first_name')->get(),
            'plans'  => FeePlan::orderBy('name')->get(),
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'member_id'  =>'required|exists:members,id',
            'fee_plan_id'=>'required|exists:fee_plans,id',
            'amount'     =>'required|numeric|min:0',
            'due_date'   =>'required|date',
        ]);
        Payment::create($data + ['status'=>'pending']);
        return redirect()->route('payments.index')->with('ok','Uplata kreirana.');
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', [
            'payment'=>$payment,
            'members'=> Member::orderBy('first_name')->get(),
            'plans'  => FeePlan::orderBy('name')->get(),
        ]);
    }

    public function update(Request $r, Payment $payment)
    {
        $data = $r->validate([
            'member_id'  =>'required|exists:members,id',
            'fee_plan_id'=>'required|exists:fee_plans,id',
            'amount'     =>'required|numeric|min:0',
            'due_date'   =>'required|date',
            'status'     =>'required|in:pending,paid,overdue',
            'paid_at'    =>'nullable|date'
        ]);
        $payment->update($data);
        return back()->with('ok','Uplata ažurirana.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('ok','Uplata obrisana.');
    }

    public function markPaid(Payment $payment)
    {
        $payment->update(['status'=>'paid','paid_at'=>now()]);
        return back()->with('ok','Označeno kao plaćeno.');
    }
}
