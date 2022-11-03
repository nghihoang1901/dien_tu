<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class NomalPageController extends Controller
{
    function index()
    {
        $user_info = Session::get('user_info');
        $list_san_pham_laptop = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 2 LIMIT 8');
        $list_san_pham_PC = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 1 LIMIT 8');
        $list_san_pham_ban_phim = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 3 LIMIT 8');
        $list_san_pham_chuot = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 4 LIMIT 8');
        $list_san_pham_lot_chuot = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 5 LIMIT 8');
        $list_san_pham_tai_nghe = DB::select('SELECT * FROM bs_linh_kien WHERE id_loai_linh_kien = 6 LIMIT 8');

        $list_loai_linh_kien = DB::table('bs_loai_linh_kien')
            ->get();


        return view('trang_chu')
            ->with('user_info', $user_info)
            ->with('list_san_pham_laptop', $list_san_pham_laptop)
            ->with('list_san_pham_PC', $list_san_pham_PC)
            ->with('list_san_pham_ban_phim', $list_san_pham_ban_phim)
            ->with('list_san_pham_chuot', $list_san_pham_chuot)
            ->with('list_san_pham_lot_chuot', $list_san_pham_lot_chuot)
            ->with('list_san_pham_tai_nghe', $list_san_pham_tai_nghe);
    }

    function logout(Request $request)
    {
        Session::forget('user_info');
        return redirect($request->server('HTTP_REFERER'), 302);
    }

    function gio_hang()
    {
        $gio_hang = [];
        if (Session::has('gio_hang')) {
            $gio_hang = Session::get('gio_hang');
        }

        $tong_tien = 0;
        foreach ($gio_hang as $sp) {
            $tong_tien += $sp->so_luong * $sp->don_gia;
        }

        return view('trang_gio_hang')->with('allow_update_cart', true);
    }

    function thanh_toan()
    {
        return view('trang_thanh_toan')->with('allow_update_cart', false);
    }
    function thanh_toan_store(Request $request)
    {
        $gio_hang = [];
        if (Session::has('gio_hang')) {
            $gio_hang = Session::get('gio_hang');
        }

        if (count($gio_hang) > 0) {
            $ho_ten = $request->get('ho_ten');
            $email = $request->get('email');
            $dien_thoai = $request->get('dien_thoai');
            $dia_chi = $request->get('dia_chi');
            $trang_thai = 2;
            $tong_tien = 0;
            $ngay_dat = date("Y-m-d H:i:s");

            $tong_tien = 0;
            foreach ($gio_hang as $sp) {
                $tong_tien += $sp->so_luong * $sp->don_gia;
            }

            DB::transaction(function () use ($ho_ten, $email, $dia_chi, $dien_thoai, $tong_tien, $trang_thai, $ngay_dat, $gio_hang) {
                // thêm đơn hàng
                $id_don_hang = DB::table('bs_don_hang')
                    ->insertGetId([
                        "ho_ten_nguoi_nhan" => $ho_ten,
                        "email_nguoi_nhan" => $email,
                        "so_dien_thoai_nguoi_nhan" => $dien_thoai,
                        "trang_thai" => $trang_thai,
                        "dia_chi_nguoi_nhan" => $dia_chi,
                        "tong_tien" => $tong_tien,
                        "ngay_dat" => $ngay_dat,
                    ]);

                // thêm chi tiết đon hàng
                foreach ($gio_hang as $sp) {
                    DB::table('bs_chi_tiet_don_hang')
                        ->insert([
                            "id_don_hang" => $id_don_hang,
                            "id_linh_kien" => $sp->id,
                            "so_luong" => $sp->so_luong,
                            "don_gia" => $sp->don_gia,
                            "thanh_tien" => $sp->so_luong * $sp->don_gia,
                        ]);
                }
            });
            Session::forget('gio_hang');
            Session::forget('tong_so_luong');
            Session::forget('tong_tien');
            // echo 'done';
            return redirect('/')->withErrors(['Đặt hàng thành công'], 'noticeOrder');

        } else {
            return redirect('/', 302);
        }
    }
    function tin_tuc()
    {
        $ds_tin_tuc = DB::table('bs_tin_tuc')->orderBy('id', 'DESC')->get();
        return view('trang_tin_tuc')
            ->with('ds_tin_tuc', $ds_tin_tuc);
    }

    function lien_he()
    {
        return view('trang_lien_he');
    }
    function lien_he_store(Request $request)
    {
        // echo 123;
        $email = $request->get('email');
        $tieu_de = $request->get('tieu_de');
        $noi_dung = $request->get('noi_dung');

        DB::table('bs_lien_he')
            ->insert([
                'email' => $email,
                'tieu_de' => $tieu_de,
                'noi_dung' => $noi_dung
            ]);

        return redirect($request->server('HTTP_REFERER'), 302)->withErrors(['Bạn đã gửi thông tin liên hệ thành công'], 'noticeSuccess');
    }
}