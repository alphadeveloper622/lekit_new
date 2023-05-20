<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PermissionInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Role\RoleInterface;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roles;
    protected $permissions;

    public function __construct(RoleInterface $roles, PermissionInterface $permissions)
    {
        $this->roles       = $roles;
        $this->permissions = $permissions;
    }
    public function index()
    {
        $roles = $this->roles->paginate(get_pagination('pagination'));
        return view('admin.roles.index', compact('roles'));
    }

    public function createRole()
    {
        $permissions = $this->permissions->all();
        return view('admin.roles.form', compact('permissions'));
    }
    public function store(RoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->roles->store($request);
             Toastr::success(__('Created Successfully'));
             DB::commit();
             return redirect()->route('roles');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
     }
    public function edit($id, Request $request)
    {
        $permissions = $this->permissions->all();
        $role        = $this->roles->get($id);
        $r           = $request->server('HTTP_REFERER');
        return view('admin.roles.form', compact('role','permissions','r'));
    }

    public function update(RoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->roles->update($request);
             Toastr::success(__('Updated Successfully'));
             DB::commit();
            return redirect($request->r);
        } catch (\Exception $e) {

            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function getRoleByAjax(Request $request)
    {
        $id           = trim($request->id);
        if (empty($id)) {
            return \Response::json([]);
        }

        $role        = $this->roles->get($id);

        return \Response::json($role);
    }
}
