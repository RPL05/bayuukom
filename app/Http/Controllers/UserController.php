<?php

namespace App\Http\Controllers;

use App\User;
use App\Barang;
use App\Permintaan;
use App\Http\Requests\UserRequest;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        $totalrequest = Permintaan::all()->count();
        $bar = Barang::all();
        $data = [
            'barang'      => Barang::Count()->get(),
            'perm'        => Permintaan::all(),
        ];

        return view('user.index', $data ,compact('users','totalrequest','bar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();

        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
            'perm'        => Permintaan::all(),
        ];

        return view('user.create', $data, compact('roles','totalrequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'roles'         => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));
            flash()->success('Pengguna berhasil ditambahkan');
        } else {
            flash()->error('Tidak dapat menambahkan pengguna');
        }


        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $totalrequest = Permintaan::all()->count();
        $data = [
            'barang'      => Barang::Count()->get(),
            'perm'        => Permintaan::all(),
        ];
        $roles = Role::all();
        return view('user.edit', $data, compact('user','roles','totalrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
        ]);

       $user->update($request->all());

       flash()->success('data pengguna berhasil di perbaharui');

       return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash()->success('data pengguna berhasil di hapus');

        return redirect()->route('users.index');
    }
}
