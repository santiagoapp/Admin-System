<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
	public function index()
	{
		return view('roles');
	}
	public function getRoles(){
		return Role::orderBy('id','desc')->get();
	}
	public function getPermisos(){
		return Permission::orderBy('id','desc')->get();
	}
	public function deleteRol(Request $request){
		$rol = Role::findOrFail($request->id);
		$rol->delete();
		return 'El registro ha sido eliminado';
	}
	public function getPermissionsByRole(Request $request){
		$rol = Role::findByName($request->name)->permissions()->get();
		return response()->json($rol);
	}
	public function setPermissionsByRole(Request $request){
		$rol = Role::findByName($request->permisoAnterior);
		$rol->name = $request->name;
		$rol->save();
		$rol->syncPermissions($request->permisos);
		return response()->json($rol);

		// return $request->name;
	}
}
