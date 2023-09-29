<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++){
            Room::create([
                "room_name" => "G".$i,
                "room_number" => "0".$i,
                "bed" => rand(1,3),
                "price" => 10 * $i,
                "image" => "",
                "status" => "Online"
            ]);
        }

        $user = User::create([
            'name' => 'admin',
            'email' => 'admincamping123@gmail.com',
            'password' => bcrypt('camping123')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'booking-list',
            'booking-create',
            'booking-edit',
            'booking-delete',
            'confirm-booking'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}
