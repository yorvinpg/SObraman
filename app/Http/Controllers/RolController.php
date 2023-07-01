<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|anular-rol', ['only' => ['index']]);
        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
        $this->middleware('permission:anular-rol', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::paginate(5);
        $user = User::find(1); // Suponiendo que deseas obtener el rol del usuario con ID 1
        $role = $user->adminlte_desc();
        echo $role;
        return view('entorno.roles.rol', compact('roles'));
    }
  

    public function create()
    {
        $permission = Permission::get();

        return view('entorno.roles.crear', compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required'
        ]);
        $rol = Role::create(['name' => $request->input('name')]);
        $rol->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->toArray();

        return view('entorno.roles.editar', compact('role', 'permission', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index');
    }
}
