<?php

namespace App\Http\Middleware;

use App\Helpers\GateHelper;
use App\Helpers\GateSupportHelper;
use App\Models\Permission;
use App\Models\PermissionRole;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		Gate::setUserResolver(function(){
			return true;
		});

		if(session('UserIsAuthenticated')){

			session(['defaultRole' => (session('defaultRole') == null) ? 0 : session('defaultRole')]);

			$role_id = [];
			$permission_user = [];
			
			if(session('defaultRole') != 0){
				$role_id[] = session('defaultRole');
			}else{
				foreach (session('authUserData')->roles as $role) {
					$role_id[] = $role->id;
				}
			}

			$permissions = Permission::all();
			$permission_roles = PermissionRole::whereIn('role_id', $role_id)->get();

			foreach ($permissions as $permission) {
				Gate::define($permission->name, function() use ($permission, $permission_roles){
					return $permission_roles->contains('permission_id', $permission->id);
				});
			}

		}else{
			session(['urlToRedirect'=>$request->url()]);
            return redirect('authenticateToSSO');
		}

        return $next($request);
    }
}
