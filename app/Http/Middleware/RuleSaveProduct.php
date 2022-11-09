<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RuleSaveProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request,$id, Closure $next)
    {
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');
        $id = $request->route('id');

        if($don_gia > $gia_bia){
            return redirect('/admin/ql-san-pham/edit/' . $id)->with('NoticeSuccess', 'Thông tin sách có vấn đề: đơn giá không được lớn hơn hơn giá bìa');
        }
        else{
        return $next($request);
        }
    }
}
