<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use DB;

class PermissionRoleController extends Controller
{
	public function index(Request $request)
	{
		$role_id = (isset($request->role_id)) ? $request->role_id : 0;

		return view('admin.permission_role.index', compact('role_id'));
	}

	public function store(Request $request)
	{
	
		DB::beginTransaction();

		try {
			
			PermissionRole::where('role_id', $request->role_id)->delete();
			
			foreach (array_unique($request->permission_id) as $permission_id) {
				PermissionRole::create([
					'role_id' => $request->role_id,
					'permission_id' => $permission_id,
				]);
			}

			DB::commit();

			return response()->json('Succesfully updated', 201);
		} catch (\Throwable $th) {
			DB::rollback();

			return response()->json('Error ' . $th, 500);
		}

	}
}
