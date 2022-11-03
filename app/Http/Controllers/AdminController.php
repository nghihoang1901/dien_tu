<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'bạn đã vào được admin';
        $ds_thong_ke_don_hang = DB::select('SELECT * FROM bs_don_hang WHERE YEAR(ngay_dat) = 2016');
        $mang_thong_ke = [];
        for($thang =1; $thang <= 12; $thang ++){
            $tong_so_tien = 0;
            foreach($ds_thong_ke_don_hang as $don_hang){
                $month = date("m", strtotime($don_hang->ngay_dat));
                if($month == $thang){
                    $tong_so_tien += $don_hang->tong_tien;
                }
            }
            $mang_thong_ke[] = $tong_so_tien;
        }
            // echo "<pre>",print_r($mang_thong_ke),"</pre>";
        $chuoi_data = json_encode($mang_thong_ke);
        return view('page_admin.trang_dashboard_admin')->with('chuoi_data', $chuoi_data);
    }

    function thong_ke($nam){
        if($nam >= 2016 && $nam <= date('Y')){
            $ds_don_hang_thong_ke = DB::select('SELECT * FROM bs_don_hang WHERE YEAR(ngay_dat) = ' . $nam);

            $mang_thong_ke = [];
            for($thang = 1; $thang <= 12; $thang++){
                $tong_so_tien = 0;
                foreach($ds_don_hang_thong_ke as $don_hang){
                    $month = date("m",strtotime($don_hang->ngay_dat));
                    if($month == $thang){
                        $tong_so_tien += $don_hang->tong_tien;
                    }
                }

                $mang_thong_ke[] = $tong_so_tien;
            }

            //echo '<pre>',print_r($mang_thong_ke),'</pre>';
            $chuoi_data = json_encode($mang_thong_ke);

            return response()->json(['status' => true, 'data' => $chuoi_data]);
        }
        else{
            return response()->json(['status' => false, 'message' => 'làm gì đó?']);
        }
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
        //
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

    public function login_admin(){

        if(Session::has('user_info')){
            $user_info = Session::get('user_info');

            if($user_info->id_loai_user > 4){
                return redirect('/admins');
            }
            else{
                return redirect('/');
            }
        }

        return view('page_admin.trang_login_admin');
    }
}
