<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador tiene la autorizacion de toda la pagina web';
        $role->save();
        $role = new Role();
        $role->name = 'tecnico';
        $role->description = 'Tecnico solo puede agregar o modificar nuevos clientes ';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User podra ver el estado de su internet los dias de pago y demas';
        $role->save();
    }
}
