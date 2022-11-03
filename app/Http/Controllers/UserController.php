<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use stdClass;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        // $files_hinh = $request->file('avatar');
        $cur_time = time();
        $name_file = $request->file('avatar')->getClientOriginalName();
        $arr_name_file = explode('.', $name_file);

        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $data_of_birth = $request->input('data_of_birth');

        $public_path = public_path();
        $image_name = $arr_name_file[0] . '_' . $cur_time . $arr_name_file[count($arr_name_file) - 1];
        if ($request->file('avatar')->isValid()) {
            $request->file('avatar')->move($public_path . '/images', $image_name);
        }

        $user_new = (object)[];
        $user_new->username = $username;
        $user_new->password = $password;
        $user_new->email = $email;
        $user_new->image_name = $image_name;
        $user_new->date_of_birth = $data_of_birth;
        

        $data_string_user = file_get_contents(resource_path('data_temp/user.json'));
        $list_user = json_decode($data_string_user);
        $list_user[] = $user_new;
        file_put_contents(resource_path('data_temp/user.json'), json_encode($list_user));

        Session::put('user_info', $user_new);

        return view('redirect_page')
            ->with('message_notice', 'Đăng ký thành công, bạn sẽ nhận được email thông báo')
            ->with('type_notice', 'success')
            ->with('url_redirect', '/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createNewAccount()
    {
        return view('trang_dang_ky');
    }
    public function loginAccount()
    {
        return view('trang_dang_nhap');
    }

    public function login(LoginRequest $request)
    {
        // $data_string_user = file_get_contents(resource_path('data_temp/user.json'));
        // $list_user = json_decode($data_string_user);
        $username = $request->input('username');
        $password = $request->input('password');

        // $login_flag = 0;
        // for ($i = 0; $i < count($list_user); $i++) {
        //     if ($list_user[$i]->username == $username && $list_user[$i]->password == $password) {
        //         $login_flag = 1;
        //         Session::put('user_info', $list_user[$i]);
        //         return redirect('/');
        //     }
        // }
        // if ($login_flag === 0) {
        //     return view("trang_dang_nhap");
        // }
        $user = DB::table('bs_nguoi_dung')
            ->where('tai_khoan', $username)
            ->where('mat_khau', $password)
            ->first();
        if(isset($user->tai_khoan)){
            $user->mat_khau = '';
            Session::put('user_info', $user);
            return redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            return redirect($_SERVER['HTTP_REFERER'])->withErrors('Tài khoản hoặc mật khẩu không chính xác', 'loginErrors');
        }

        // return redirect($_SERVER['HTTP_REFERER'])->withErrors('Server Internal Error', 'loginErrors');
        // echo "<pre>",print_r($user),"</pre>";
    }
}