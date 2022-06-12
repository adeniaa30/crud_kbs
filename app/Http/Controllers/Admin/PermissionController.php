<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\Auth\PermissionService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class PermissionController extends Controller
{
	public function index(Request $request, Builder $htmlBuilder)
	{
		if (request()->ajax()) {
            return DataTables::of(PermissionService::all())
            ->addColumn('action', function($permission){
                return view('datatable._action_dinamyc', [
                    'model'           => $permission,
                    'delete'          => route('permission.destroy', $permission->id),
                    'url'             => [
                        'Edit'        => route('permission.edit', $permission->id),
                    ],
                    'confirm_message' =>  'Are you sure to delete "' . $permission->display_name . '" ?',
                    'padding'         => '50px',
                ]);
			})
			->editColumn('is_parent', function($permission){
				return ($permission->is_parent == 'y') ? 'Ya' : 'Tidak';
			})->rawColumns(['action', 'is_parent'])->toJson();
        }

        $html = $htmlBuilder
              ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false])
			  ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Kode' ])
              ->addColumn(['data' => 'is_parent', 'name' => 'is_parent', 'title' => 'Parent' ])
              ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama' ])
              ->addColumn(['data' => 'display_name', 'name' => 'display_name', 'title' => 'Nama Display' ])
              ->parameters([
                'scrollX' => true,
                'stateSave' => true,
                'order' => [1, 'asc']
              ]);

        return view('admin.permission.index')->with(compact('html'));
	}

	public function create()
	{
		return view('admin.permission.create');
	}

	public function store(PermissionRequest $request)
    {
        $result = PermissionService::create($request->except('_token'));

        if ($result) 
            return redirect(route('permission.index'))->with('status', 'Successfully created');
        else
            return redirect(route('permission.create'))->with('error', 'Failed to create');
    }

	public function edit($id)
    {
        $permission = PermissionService::find($id);
		
		return view('admin.permission.edit')->with(compact(
            'permission'
        ));
    }

    public function update($id, Request $request)
    {
        $result = PermissionService::update($request->except('_token', '_method'), $id);
        
        if ($result) 
            return redirect(route('permission.index'))->with('status', 'Successfully updated');
        else
            return back()->with('error','Failed to update');
    }

    public function destroy($id)
    {  
        $result = PermissionService::destroy($id);

        if ($result)
            return redirect(route('language.index'))->with('status', 'Successfully deleted');
        else
            return redirect(route('language.index'))->with('error','Failed to delete');
	}
	
	public function select(Request $request)
	{
		$data = PermissionService::select_by_value($request);

		$tag = [];
		foreach ($data as $index => $value) {
			$tag[] = ['id' => $value->id, 'text' => ($value->display_name)];
		}

		return response()->json($tag);
	}
}
