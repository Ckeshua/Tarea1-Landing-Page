<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'Secretario']);
        $role3 = Role::create(['name' => 'Trabajador de planta']);
        $role4 = Role::create(['name' => 'Practicante']);
        Permission::create(['name' => 'guardarUs'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'Seguridad nivel 1'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'Seguridad nivel 2'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'Seguridad nivel 3'])->syncRoles([$role1,$role2]);
        
    }
}
