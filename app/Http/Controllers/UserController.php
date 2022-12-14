<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();//Query builder

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        try {
            $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        alert()->success('Thêm nhân viên','thành công');

        return redirect()->route('user.index');
        } catch (\Throwable $th) {
            alert()->error('Thêm nhân viên','không thành công');

        }

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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact ('user'));
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
        try {
            $user = new User();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        alert()->success('Cập nhật','thành công');

        return redirect()->route('user.index');
        } catch (\Throwable $th) {
        alert()->error('Cập nhật','không thành công');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            alert()->success('Xoá nhân viên','thành công');

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            alert()->error('Xoá nhân viên','không thành công');

        }

    }
    public function viewLogin()
  {
      return view('auth.login');
  }
  //xử lí đăng nhập
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);
      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);
      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
          return redirect()->route('user.index');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
  }
  //Hiển Thị Đăng Ký
  public function viewRegister()
  {
      return view('auth.register');
  }
  //xử lí đăng ký
  public function register(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:6',
    ],
        [
            'name.required'=>'Không được để trống',
            'email.required'=>'Không được để trống',
            'email.unique'=>'Trùng Email',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      try {
          
          $user->save();
          return redirect()->route('login');
      } catch (\Exception $e) {
          Log::error("message:".$e->getMessage());
      }
  }
      public function logout(Request $request)
      {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
      }
}
