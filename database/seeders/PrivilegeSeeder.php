<?php

namespace Database\Seeders;

use App\Models\Privilege;
use Illuminate\Database\Seeder;

class PrivilegeSeeder extends Seeder
{
    public function run()
    {
        Privilege::create([
            'name' => 'studnet',
            'discount' => 10,
        ]);

        Privilege::create([
            'name' => 'staff',
            'discount' => 0,
        ]);

        Privilege::create([
            'name' => 'web-manager',
            'discount' => 0,
        ]);
    }
}
