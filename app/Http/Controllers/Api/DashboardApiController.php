<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Merchant;
use App\MerchantUser;
use Illuminate\Support\Facades\DB;

class DashboardApiController extends ApiController
{

    public function newUserCount(Request $request)
    {
        $merchant = Merchant::where('sub_domain', $request->subDomain)->first();
        $merchant_id = $merchant->id;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        if ($start_time == null) {
            $start_time = "2018-06-13";
            $end_time = "2018-06-22";
        }
        $date_array = createDateRangeArray(strtotime($start_time), strtotime($end_time));
        $new_user_by_date_temp = MerchantUser::select(DB::raw('DATE(created_at) as date,count(1) as num'))
            ->whereBetween(DB::raw('DATE(created_at)'), [$start_time, $end_time])
            ->where('merchant_id', $merchant_id)
            ->groupBy(DB::raw('DATE(created_at)'))->pluck('num', 'date');

        $new_user_by_date = [];
        foreach ($date_array as $date) {
            if (isset($new_user_by_date_temp[$date])) {
                $new_user_by_date[] = [
                    "date" => $date,
                    "count" => $new_user_by_date_temp[$date]
                ];
            } else {
                $new_user_by_date[] = [
                    "date" => $date,
                    "count" => 0
                ];
            }
        }

        $total_posts = $merchant->posts()->count();

        $total_users = $merchant->users()->count();
        return $this->success([
            "new_user_id_by_date" => $new_user_by_date,
            "total_posts" => $total_posts,
            "total_users" => $total_users
        ]);
    }
}
