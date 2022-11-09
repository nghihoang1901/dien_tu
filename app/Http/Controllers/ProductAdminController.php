<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;
use TheSeer\Tokenizer\Exception;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 123;
        $ds_san_pham = DB::table('bs_linh_kien')
            ->select(
                DB::raw('bs_linh_kien.*, ten_loai_linh_kien, ten_hang_san_xuat')
            )
            ->join(
                'bs_loai_linh_kien',
                'bs_linh_kien.id_loai_linh_kien',
                '=',
                'bs_loai_linh_kien.id'
            )
            ->join(
                'bs_hang_san_xuat',
                'bs_linh_kien.id_hang_san_xuat',
                '=',
                'bs_hang_san_xuat.id'
            )
            ->get(
            );
        // echo "<pre>",print_r($ds_linh_kien),"</pre>";
        return view('page_admin.trang_ds_san_pham')->with('ds_san_pham', $ds_san_pham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_loai_san_pham = DB::table('bs_loai_linh_kien')->get();
        $ds_hang_san_xuat = DB::table('bs_hang_san_xuat')->get();
        return view('page_admin.trang_them_san_pham')
            ->with(
                'ds_loai_san_pham',
                $ds_loai_san_pham
            )
            ->with(
                'ds_hang_san_xuat',
                $ds_hang_san_xuat
            );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $so_seri_linh_kien = $request->get('so_seri_linh_kien');
        $ten_linh_kien = $request->get('ten_linh_kien');
        $id_hang_san_xuat = $request->get('id_hang_san_xuat');
        $id_loai_linh_kien = $request->get('id_loai_linh_kien');
        $nam_san_xuat = $request->get('nam_san_xuat');
        $thong_tin_bao_hanh = $request->get('thong_tin_bao_hanh');
        $thong_so_ky_thuat = $request->get('editor1');
        $danh_gia_chi_tiet = $request->get('editor1');
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');
        $trang_thai = $request->get('trang_thai');
        $noi_bat = $request->get('noi_bat');
        $hinh_san_pham = $request->file('hinh_san_pham');
        // echo "<pre>",print_r($hinh_san_pham),"</pre>";

        $cur_time = time();

        $name_file = $hinh_san_pham->getClientOriginalName();
        $arr_name_file = explode('.', $name_file);

        $public_path = public_path();
        $hinh = $arr_name_file[0] . '_' . $cur_time . '.' . $arr_name_file[count($arr_name_file) - 1];
        if ($hinh_san_pham->isValid()) {
            $hinh_san_pham->move($public_path . '/images/san_pham', $hinh);
        }


        $id_san_pham_moi = DB::table('bs_linh_kien')
            ->insertGetId(
                [
                    'so_seri_linh_kien' => $so_seri_linh_kien,
                    'ten_linh_kien' => $ten_linh_kien,
                    'id_hang_san_xuat' => $id_hang_san_xuat,
                    'id_loai_linh_kien' => $id_loai_linh_kien,
                    'nam_san_xuat' => $nam_san_xuat,
                    'thong_tin_bao_hanh' => $thong_tin_bao_hanh,
                    'thong_so_ky_thuat' => $thong_so_ky_thuat,
                    'danh_gia_chi_tiet' => $danh_gia_chi_tiet,
                    'trang_thai' => $trang_thai,
                    'don_gia' => $don_gia,
                    'gia_bia' => $gia_bia,
                    'noi_bat' => $noi_bat,
                    'hinh' => $hinh
                ]
            );
        return redirect('/admin/ql-san-pham/create')->with('NoticeSuccess', 'Thêm sản phẩm mới thành công');
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
        // echo $id;
        $ds_loai_san_pham = DB::table('bs_loai_linh_kien')->get();
        $ds_hang_san_xuat = DB::table('bs_hang_san_xuat')->get();
        $thong_tin_sp = DB::table('bs_linh_kien')->where('id', $id)->first();

        return view('page_admin.trang_them_san_pham')
            ->with(
                'ds_loai_san_pham',
                $ds_loai_san_pham
            )
            ->with(
                'ds_hang_san_xuat',
                $ds_hang_san_xuat
            )
            ->with(
                'thong_tin_sp',
                $thong_tin_sp
            );

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
        $so_seri_linh_kien = $request->get('so_seri_linh_kien');
        $ten_linh_kien = $request->get('ten_linh_kien');
        $id_hang_san_xuat = $request->get('id_hang_san_xuat');
        $id_loai_linh_kien = $request->get('id_loai_linh_kien');
        $nam_san_xuat = $request->get('nam_san_xuat');
        $thong_tin_bao_hanh = $request->get('thong_tin_bao_hanh');
        $thong_so_ky_thuat = $request->get('editor1');
        $danh_gia_chi_tiet = $request->get('editor1');
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');
        $trang_thai = $request->get('trang_thai');
        $noi_bat = $request->get('noi_bat');
        $hinh = $request->get('hinh');

        if ($request->hasFile('hinh_san_pham')) {
            $hinh_san_pham = $request->file('hinh_san_pham');
            $cur_time = time();

            $name_file = $hinh_san_pham->getClientOriginalName();
            $arr_name_file = explode('.', $name_file);

            $public_path = public_path();
            $hinh = $arr_name_file[0] . '_' . $cur_time . '.' . $arr_name_file[count($arr_name_file) - 1];
            if ($hinh_san_pham->isValid()) {
                $hinh_san_pham->move($public_path . '/images/san_pham', $hinh);
            }
        }

        $result = DB::table('bs_linh_kien')
            ->where('id',$id)
            ->update(
                [
                    'so_seri_linh_kien' => $so_seri_linh_kien,
                    'ten_linh_kien' => $ten_linh_kien,
                    'id_hang_san_xuat' => $id_hang_san_xuat,
                    'id_loai_linh_kien' => $id_loai_linh_kien,
                    'nam_san_xuat' => $nam_san_xuat,
                    'thong_tin_bao_hanh' => $thong_tin_bao_hanh,
                    'thong_so_ky_thuat' => $thong_so_ky_thuat,
                    'danh_gia_chi_tiet' => $danh_gia_chi_tiet,
                    'trang_thai' => $trang_thai,
                    'don_gia' => $don_gia,
                    'gia_bia' => $gia_bia,
                    'noi_bat' => $noi_bat,
                    'hinh' => $hinh

                ]
            );
        return redirect('/admin/ql-san-pham/edit/' . $id)->with('NoticeSuccess', 'Cập nhật sản phẩm thành công');
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
            DB::table('bs_linh_kien')->where('id', $id)->delete();
            return redirect($_SERVER['HTTP_REFERER'])->withErrors('Đã xóa thành công sản phẩm có ID là ' . $id, 'noticeDelete');
        } catch (Exception $e) {
            return redirect($_SERVER['HTTP_REFERER'])->withErrors('Xóa sản phẩm bị lỗi' . $e, 'noticeDelete');
        }

    }
}