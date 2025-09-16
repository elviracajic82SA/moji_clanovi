<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $q = request('q');
        $members = Member::when($q, fn($s)=>$s
            ->where('first_name','like',"%$q%")
            ->orWhere('last_name','like',"%$q%")
            ->orWhere('email','like',"%$q%"))
            ->latest()->paginate(10)->withQueryString();

        return view('members.index', compact('members','q'));
    }

    public function create(){ return view('members.create'); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'first_name'=>'required|max:100',
            'last_name' =>'required|max:100',
            'email'     =>'required|email|unique:members,email',
            'phone'     =>'nullable|max:50',
            'status'    =>'required|in:active,inactive'
        ]);
        Member::create($data);
        return redirect()->route('members.index')->with('ok','Član dodat.');
    }

    public function edit(Member $member){ return view('members.edit', compact('member')); }

    public function update(Request $r, Member $member)
    {
        $data = $r->validate([
            'first_name'=>'required|max:100',
            'last_name' =>'required|max:100',
            'email'     =>'required|email|unique:members,email,'.$member->id,
            'phone'     =>'nullable|max:50',
            'status'    =>'required|in:active,inactive'
        ]);
        $member->update($data);
        return back()->with('ok','Član ažuriran.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('ok','Član obrisan.');
    }
}
