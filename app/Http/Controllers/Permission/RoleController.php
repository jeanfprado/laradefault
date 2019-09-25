<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoleRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('module_role');
        $roles = $this->repository->all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('module_role.create');
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('module_role.create');
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->back()->with('success', 'Registo Salvo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function showPermission(Role $role)
    {
        $this->authorize('module_role.create');
        return view('roles.permission', compact('role'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePermission(Request $request)
    {
        $this->authorize('module_role.create');
        $data = $request->all();

        //separa o array de permissões
        $permissions = array_key_exists('permissions', $data)
            ? $data['permissions'] : [];

        $role = Role::find($data['role_id']);

        //sincronisa do cados de permissão padrão N:N do laravel
        $role->permission()->sync($permissions);

        return redirect()->back()->with('success', 'Registro Salvo!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('module_role.edit');
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('module_role.edit');
        $data = $request->all();

        $this->repository->update($data, $role->id);

        return redirect()->back()->with('success', 'Registo Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('module_role.delete');
        $this->repository->delete($role->id);

        return redirect()->back()->with('success', 'Registo Excluído!');
    }
}
