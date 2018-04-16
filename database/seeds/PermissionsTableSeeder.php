<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = [
    		// mantenimiento
    		'Ver Equipos',
    		'Agregar Equipos',
    		'Editar Equipos',
    		'Eliminar Equipos',
    		// calidad
    		'Ver Certificados',
    		'Agregar Certificados',
    		'Editar Certificados',
    		'Eliminar Certificados',
    		// producción OTs
    		'Ver OTs',
    		'Agregar OTs',
    		'Editar OTs',
    		'Eliminar OTs',
    		// producción RQs
    		'Ver RQs',
    		'Agregar RQs',
    		'Editar RQs',
    		'Eliminar RQs',
    		// producción OCs
    		'Ver OCs',
    		'Agregar OCs',
    		'Editar OCs',
    		'Eliminar OCs',
    		// producción OSs
    		'Ver OSs',
    		'Agregar OSs',
    		'Editar OSs',
    		'Eliminar OSs',
    		// producción RVs
    		'Ver RVs',
    		'Agregar RVs',
    		'Editar RVs',
    		'Eliminar RVs',
    		// producción REs
    		'Ver REs',
    		'Agregar REs',
    		'Editar REs',
    		'Eliminar REs',
    		// Usuarios
    		'Ver usuarios',
    		'Agregar usuarios',
    		'Editar usuarios',
    		'Eliminar usuarios',
    		// Estadisticas
    		'Estadísticas Compras',
    		'Estadísticas Ventas',
    		'Estadísticas Recursos Humanos',
    		'Estadísticas Producción',
    		'Estadísticas Ingeniería',
    		'Estadísticas Gerencia General',
    		'Estadísticas Contabilidad',
    		'Estadísticas Almacén',
    		// Otros
            'Ver Calendario',
            'Ver Mapa',
            'Ver Alertas'
        ];
        
        foreach ($permissions as $permission) {
          factory(Permission::class)->create([
             'name'=>$permission
         ]);
      }
  }
}
