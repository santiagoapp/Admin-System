<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
		// $daw = Role::findByName($request->name)->permissions()->get();
		return '$request->name';
	}
}
