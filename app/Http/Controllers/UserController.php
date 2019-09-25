<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('module_user.show');
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $this->authorize('module_user.show');
        $user = Auth::user();
        return view('users.profile', compact('user'));
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

        return redirect()->back()->with('success', 'Registro atualizado!');
    }

    public function profileUpdate(Request $request)
    {
         $data = $request->all();

         User::where('id', Auth::id())->update(['name' => $data['name'], 'email' => $data['email']]);

         return redirect()->back()->with('success', 'Perfil atualizado!');
    }

    public function newPassword(Request $request)
    {
 
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with(
                "error",
                "Sua senha atual não corresponde à senha que você forneceu.".
                "Por favor, tente novamente."
            );
        }
 
        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with(
                "error",
                "A nova senha não pode ser igual à sua senha atual.".
                " Por favor, escolha uma senha diferente."
            );
        }
 
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
 
        return redirect()->back()->with("success", "Senha alterada com sucesso !");
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
