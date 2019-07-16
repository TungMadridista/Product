<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if (User::create($data)) {
            return redirect('admin/user/list')->with('message', 'Add User Success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $user = User::find($id_user);
        return view('admin.pages.user.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id_user)
    {
        $user = User::find($id_user);
        $data = $request->all();
        if($data['password']) {
            $data['password'] = Hash::make($request->password);
        }
        if ($user->update($data)) {
            return redirect('admin/user/list')->with('message', 'Edit User Success');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);
        if ($user->delete()) {
            return redirect('admin/user/list')->with('message', 'Delete User Success');
        }
    }

    public function getLogin()
    {
        if(Auth::user()) {
            $user = Auth::user();
            if ($user->role > 0) {
                return redirect('admin/category/list');
            }
        } else {
            return view('admin.pages.login');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            $user = Auth::user();
            if($user->role == 1)
                return redirect('admin/category/list')->with('message','Logged in successfully!');
        }else{
            return redirect()->back()->with('error','Login failed, please check your account again!');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login')->with('error','Dang nhap vao trang quan tri');
    }
}
