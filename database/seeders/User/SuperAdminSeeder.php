<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run():void
    {
        User::factory()->create([
            'name' => 'Super Admin System',
            'email' => 'super@admin.com'
        ]);
    }
}