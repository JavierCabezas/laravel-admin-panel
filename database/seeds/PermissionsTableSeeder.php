<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            ['display_name' => 'Ver Modulos Plataforma'],
            ['display_name' => 'Ver Control Acceso'],

        ];

        foreach ($permisos as $item){
            Permission::create([
                'display_name'  => $item['display_name'],
                'name'          => str_slug($item['display_name'])
            ]);
        }
    }
}
