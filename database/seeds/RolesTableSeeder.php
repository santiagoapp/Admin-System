<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
    		'Compras',
    		'Ventas',
    		'Recursos Humanos',
    		'Producción',
    		'Ingeniería',
    		'Gerencia General',
    		'Contabilidad',
    		'Almacén',
    		'Controller',
    		'Super Usuario'
    	];
    	
    	foreach ($roles as $rol) {
    		factory(Role::class)->create([
    			'name'=>$rol
    		]);
    	}
    }
}
