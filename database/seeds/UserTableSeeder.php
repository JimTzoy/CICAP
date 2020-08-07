<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_tecnico = Role::where('name', 'tecnico')->first();
        $user = new User();
        $user->name = 'analida';
        $user->email = 'analidia@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Lucio Texcahua';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'feliciana';
        $user->email = 'feliciana@example.com';
        $user->password = bcrypt('docente');
        $user->save();
        $user->roles()->attach($role_tecnico);
    }
}
