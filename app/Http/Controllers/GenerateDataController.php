<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenerateDataController extends Controller
{
    function index($table)
    {
        ini_set('max_execution_time', 1200);

        if ($table == 'don_hang' || $table == 'bs_don_hang') {


            $nam_generate = $_GET['nam'];
            $array_month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            $array_date = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28];

            for ($k = 1; $k < count($array_month); $k++) {
                for ($j = 1; $j < count($array_date); $j++) {
                    $number_don_hang = rand(5, 30);
                    for ($number_dh = 0; $number_dh < $number_don_hang; $number_dh++) {
                        $ds_user = DB::table('bs_nguoi_dung')->get();
                        $random_user = rand(0, count($ds_user));
                        $user_cur = $ds_user[$random_user];
                        // echo "<pre>",print_r($user_cur),"</pre>";
                        $ho_ten = $user_cur->ho_ten;
                        $email = $user_cur->email;
                        $dien_thoai = $user_cur->dien_thoai;
                        $dia_chi = $user_cur->dia_chi;
                        $trang_thai = 2;
                        $tong_tien = 0;
                        // $ngay_dat = date("Y-m-d H:i:s");
                        $ngay_dat = $nam_generate . '-' . $array_month[$k] . '-' . $array_date[$j] . '-' . '00:00:00';

                        $ds_san_pham = DB::table('bs_linh_kien')->get();
                        $gio_hang = [];
                        $random_number_sp = rand(0, 10);
                        for ($i = 0; $i < $random_number_sp; $i++) {
                            $random_sp = rand(1, count($ds_san_pham) - 1);
                            $sp_cur = $ds_san_pham[$random_sp];
                            $tong_tien += $sp_cur->don_gia;

                            if (count($gio_hang)) {
                                $flag = 0;
                                for ($i = 0; $i < count($gio_hang); $i++) {
                                    if ($gio_hang[$i]->id == $sp_cur->id) {
                                        $gio_hang[$i]->so_luong += 1;
                                        $flag = 1;
                                        break;
                                    }
                                }
                                if ($flag == 0) {
                                    $sp_cur->so_luong = 1;
                                    $gio_hang[] = $sp_cur;
                                }
                            } else {
                                $sp_cur->so_luong = 1;
                                $gio_hang[] = $sp_cur;
                            }

                        }
                        // echo $tong_tien;
                        // echo "<pre>",print_r($gio_hang),"</pre>";


                        DB::transaction(
                            function () use ($ho_ten, $email, $dia_chi, $dien_thoai, $tong_tien, $trang_thai, $ngay_dat, $gio_hang) {
                                // thêm đơn hàng
                                $id_don_hang = DB::table('bs_don_hang')
                                    ->insertGetId(
                                        [
                                            "ho_ten_nguoi_nhan" => $ho_ten,
                                            "email_nguoi_nhan" => $email,
                                            "so_dien_thoai_nguoi_nhan" => $dien_thoai,
                                            "trang_thai" => $trang_thai,
                                            "dia_chi_nguoi_nhan" => $dia_chi,
                                            "tong_tien" => $tong_tien,
                                            "ngay_dat" => $ngay_dat,
                                        ]
                                    );

                                // thêm chi tiết đon hàng
                                foreach ($gio_hang as $sp) {
                                    DB::table('bs_chi_tiet_don_hang')
                                        ->insert(
                                            [
                                                "id_don_hang" => $id_don_hang,
                                                "id_linh_kien" => $sp->id,
                                                "so_luong" => $sp->so_luong,
                                                "don_gia" => $sp->don_gia,
                                                "thanh_tien" => $sp->so_luong * $sp->don_gia,
                                            ]
                                        );
                                }
                                echo $id_don_hang;
                            }
                        );
                    }


                }
            }


        }
    }
}