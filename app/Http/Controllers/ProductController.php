<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Session::get('user_id');
        // $ds_san_pham = json_decode(file_get_contents(storage_path() . "/test_data.json"));
        $ds_san_pham = DB::table('bs_linh_kien')->get();

        return view('danh_sach_san_pham')
            ->with('user_id', $user_id)
            ->with('ds_san_pham', $ds_san_pham);
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
    public function store(Request $request)
    {
        $files_hinh = $request->file('ds_hinh');
        // echo "<pre>",print_r($files_hinh),"</pre>";
        $cur_time = time();
        if (count($files_hinh) > 0) {
            foreach ($files_hinh as $hinh) {
                $name_file = $hinh->getClientOriginalName();
                $arr_name_file = explode('.', $name_file);

                $public_path = public_path();
                if ($hinh->isValid()) {
                    $hinh->move($public_path . '/images/san_pham_moi', $arr_name_file[0] . '_' . $cur_time . $arr_name_file[count($arr_name_file) - 1]);
                }
            }
        }
        return "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_san_pham)
    {
        // return "show";
        // echo $id_san_pham;
        $thong_tin_san_pham = DB::table('bs_linh_kien')
            ->select(DB::raw('bs_linh_kien.*, ten_loai_linh_kien, ten_hang_san_xuat'))
            ->join('bs_hang_san_xuat', 'bs_linh_kien.id_hang_san_xuat', '=', 'bs_hang_san_xuat.id')
            ->join('bs_loai_linh_kien', 'bs_linh_kien.id_loai_linh_kien', '=', 'bs_loai_linh_kien.id')
            ->where('bs_linh_kien.id', $id_san_pham)
            ->first();

        return view('trang_chi_tiet_san_pham')->with('thong_tin_san_pham', $thong_tin_san_pham);
        // echo "</pre>",print_r($thong_tin_san_pham),"</pre>";
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

    public function createNewProduct()
    {
        return view('trang_them_san_pham');
    }

    public function search_form()
    {
        $user_id = Session::get('user_id');
        $keyword = $_GET('keyword');

        $ds_tim_kiem = DB::table('bs_linh_kien')
            ->where('ten_linh_kien', 'like', "%$keyword%")
            ->orwhere('danh_gia_chi_tiet', 'like', "%$keyword%")
            ->get();

        return view('danh_sach_san_pham')
            ->with('user_id', $user_id)
            ->with('ds_san_pham', $ds_tim_kiem);
    }
    public function add_to_cart($id_san_pham)
    {
        // echo $id_san_pham;
        if (Session::has('gio_hang')) {
            $gio_hang = Session::get('gio_hang');

            $flag = 0;
            for ($i = 0; $i < count($gio_hang); $i++) {
                if ($gio_hang[$i]->id == $id_san_pham) {
                    $gio_hang[$i]->so_luong += 1;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 0) {
                $thong_tin_san_pham = DB::table('bs_linh_kien')->where('id', $id_san_pham)->first();
                $thong_tin_san_pham = json_decode(json_encode($thong_tin_san_pham));
                $thong_tin_san_pham->so_luong = 1;
                $gio_hang[] = $thong_tin_san_pham;
            }
        } else {
            $gio_hang = [];
            $thong_tin_san_pham = DB::table('bs_linh_kien')->where('id', $id_san_pham)->first();
            $thong_tin_san_pham = json_decode(json_encode($thong_tin_san_pham));
            $thong_tin_san_pham->so_luong = 1;
            $gio_hang[] = $thong_tin_san_pham;
        }
        $tong_so_luong = 0;
        $tong_tien = 0;
        for ($i = 0; $i < count($gio_hang); $i++) {
            $tong_so_luong += $gio_hang[$i]->so_luong;
            $tong_tien += $gio_hang[$i]->so_luong * $gio_hang[$i]->don_gia;
        }
        // echo "<pre>",print_r($gio_hang),"</pre>";
        Session::put('gio_hang', $gio_hang);
        Session::put('tong_so_luong', $tong_so_luong);
        Session::put('tong_tien', $tong_tien);
        echo json_encode($gio_hang);
    }

    function update_gio_hang($id_san_pham)
    {
        try {
            $so_luong = $_GET['so_luong'];

            //echo $id_sach . ' - ' . $so_luong;
            if (Session::has('gio_hang')) {
                $gio_hang = Session::get('gio_hang');

                $tong_tien = 0;
                $tong_so_luong = 0;
                foreach ($gio_hang as $sp) {
                    if ($sp->id == $id_san_pham) {
                        $sp->so_luong = $so_luong;
                    }

                    $tong_so_luong += $sp->so_luong;
                    $tong_tien += $sp->so_luong * $sp->don_gia;
                }

                Session::put('gio_hang', $gio_hang);
                Session::put('tong_so_luong', $tong_so_luong);
                Session::put('tong_tien', $tong_tien);
            }

            echo '1';
        } catch (Exception $e) {
            die(0);
        }
    }

    function xoa_item_gio_hang($id_san_pham)
    {
        if (Session::has('gio_hang')) {
            $gio_hang = Session::get('gio_hang');

            for ($i = 0; $i < count($gio_hang); $i++) {
                if ($gio_hang[$i]->id == $id_san_pham) {
                    array_splice($gio_hang, $i, 1);
                    break;
                }
            }

            $tong_so_luong = 0;
            $tong_tien = 0;
            foreach ($gio_hang as $sp) {
                $tong_so_luong += $sp->so_luong;
                $tong_tien += $sp->so_luong * $sp->don_gia;
            }

            Session::put('gio_hang', $gio_hang);
            Session::put('tong_so_luong', $tong_so_luong);
            Session::put('tong_tien', $tong_tien);
            echo 1;
        }
    }

    function xoa_gio_hang()
    {
        if (Session::has('gio_hang')) {
            Session::forget('gio_hang');
            Session::forget('tong_so_luong');
            Session::forget('tong_tien');
        }
        echo 1;
    }
}