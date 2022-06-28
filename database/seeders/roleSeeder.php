<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\website_info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name' => 'admin',
            ]
        );
        Role::create(
            [
                'name' => 'super_admin',
            ]
        );
        Role::create(
            [
                'name' => 'client',
            ]
        );
    }
}
