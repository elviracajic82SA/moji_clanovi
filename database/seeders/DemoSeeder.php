<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FeePlan;
use App\Models\Member;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        if (!User::where('email','admin@club.local')->exists()) {
            User::create([
                'name' => 'Admin',
                'email'=> 'admin@club.local',
                'password' => Hash::make('admin123'),
            ]);
        }

        // Fee plans
        FeePlan::firstOrCreate(['name'=>'Mjesečna','period'=>'monthly'], ['amount'=>20]);
        FeePlan::firstOrCreate(['name'=>'Godišnja','period'=>'yearly'], ['amount'=>200]);

        // Sample member
        Member::firstOrCreate(['email'=>'ana@example.com'],[
            'first_name'=>'Ana','last_name'=>'Kovač','status'=>'active'
        ]);
    }
}
