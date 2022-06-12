<?php

namespace App\Services\Auth;

use App\Models\PermissionRole;
use App\Models\Permission;
use DB;

class PermissionService
{
	private $listPermission = "";

	public function rekursive_permission($parent = 0, $role_id = 0)
	{
		$permissions = PermissionRole::get_permission_role($parent, $role_id);

		if(!empty($permissions)){
            $this->listPermission .= "<ul>";

            foreach ($permissions as $value) {
                $opened = '"opened": true';
                $selected = (!empty($value->role_id) && $value->is_parent == 'n') ? '"selected": true' : '';

                $this->listPermission .= "<li id='" . $value->id . "' data-jstree='{ " . $selected . " }'>";
                $this->listPermission .= $value->display_name;
                $this->rekursive_permission($value->id, $role_id);
                $this->listPermission .= '</li>';
            }

            $this->listPermission .= "</ul>";
        }
	}

	public function show_permission($role_id)
    {
        $this->rekursive_permission(0, $role_id);

        return $this->listPermission;
	}
	
	public static function all()
	{
		return Permission::All();
	}

	public static function select_by_value($request)
	{
		return Permission::where('display_name', 'LIKE', '%' . trim($request->input) . '%')
			->get();	
	}

	public static function create($request)
	{
		$request['parent_id'] = (isset($request['parent_id'])) ? $request['parent_id'] : 0;

		return Permission::create($request);
	}

	public static function find($id)
    {
        return Permission::with('parent')->find($id);
	}
	
	public static function update($request, $id)
	{

		$request['parent_id'] = (isset($request['parent_id'])) ? $request['parent_id'] : 0;

		return Permission::where('id', $id)->update($request);
	}

	public static function destroy($id)
    {
        $model = Permission::find($id);

        return $model->destroy($id);
    }
}