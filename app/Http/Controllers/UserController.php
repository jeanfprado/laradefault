<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('module_user');
        $users =  $this->repository->all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('module_user.create');
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('module_user.create');

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['remember_token'] = str_random(10);

        $store = $this->repository->create($data);

        $store->role()->attach($data['role_id']); //Adicionando papel ao usuário

        return redirect()->back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('module_user.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('module_user.edit');
        $roles = Role::all()->pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
   {
        $this->authorize('module_user.edit');
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['remember_token'] = str_random(10);

        $store = $this->repository->update($data, $user->id);

        $store->role()->sync($data['role_id']); //atualizando papel ao usuário

        return redirect()->back()->with('success', 'success');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  User
    * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
   {
        $this->authorize('module_user.delete');
        //
    }
}
