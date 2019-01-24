<?php

use Illuminate\Database\Seeder;
use App\Training\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'key' => 'admin',
                'name' => 'Admin'
            ],
            [
                'key' => 'root',
                'name' => 'Super user'
            ],
            [
                'key' => 'auditor',
                'name' => 'Auditor'
            ]
        ];

        foreach ($roles as $role) {
            $role = new Role($role);
            $role->save();
        }
    }
}
