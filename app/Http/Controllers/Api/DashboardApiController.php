<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DashboardApiController extends ApiController
{

    public function newUserCount(Request $request)
    {
        dd($request->subDomain);
        $date_array = createDateRangeArray(strtotime($startTime), strtotime($end_time));
        // $paid_by_date_personal_temp = Register::select(DB::raw('DATE(paid_time) as date,count(1) as num'))
        //         ->whereBetween('paid_time', [$startTime, $endTime])
        //         ->where('saler_id', $saler->id)
        //         ->where('money', '>', 0)
        //         ->groupBy(DB::raw('DATE(paid_time)'))->pluck('num', 'date');

        //     $registers_by_date_personal_temp = Register::select(DB::raw('DATE(created_at) as date,count(1) as num'))
        //         ->whereBetween('created_at', [$startTime, $endTime])
        //         ->where('saler_id', $saler->id)
        //         ->where(function ($query) {
        //             $query->where('status', 0)
        //                 ->orWhere('money', '>', 0);
        //         })
        //         ->groupBy(DB::raw('DATE(created_at)'))->pluck('num', 'date');

        //     $registers_by_date_personal = [];
        //     $paid_by_date_personal = [];

        //     foreach ($date_array as $date) {
        //         if (isset($registers_by_date_personal_temp[$date])) {
        //             $registers_by_date_personal[$di] = $registers_by_date_personal_temp[$date];
        //         } else {
        //             $registers_by_date_personal[$di] = 0;
        //         }
        //         if (isset($paid_by_date_personal_temp[$date])) {
        //             $paid_by_date_personal[$di] = $paid_by_date_personal_temp[$date];
        //         } else {
        //             $paid_by_date_personal[$di] = 0;
        //         }

        //         $di += 1;
        //     }

        //     $data['registers_by_date'] = $registers_by_date_personal;
        //     $data['paid_by_date'] = $paid_by_date_personal;
        //     $data['date_array'] = $date_array;
    }
}
