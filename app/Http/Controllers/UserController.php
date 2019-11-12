<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        //    dd($users);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($request->has('password')){
            $password = trim($request->password);
        }

        // dd($password);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();

        if($request->roles){
            $user->syncRoles($request->roles);
        }

        return redirect()->route('users.index', $user->id)
            ->with('message','User '. ucwords($user->name) .' has been Added to the database ');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->with('roles')->first();

        return view('admin.users.show', compact('user') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id',$id)->with('roles')->first();
        $roles = Role::all();

        return view('admin.users.edit', compact('users','roles') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->roles);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($request->has('password')){
            $password = trim($request->password);
        }

        // dd($password);

        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();

        if($request->roles){
            $user->syncRoles($request->roles);
        }else{
            $user->detachRoles($request->roles);
        }

        return redirect()->route('users.index')
            ->with('message','User '. ucwords($user->name) .'  has been Updated in the database ');
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

        return redirect()->route('users.index')
            ->with('message', 'User '. ucwords($user->name) . ' has been successfully Deleted from the database');
    }
}
