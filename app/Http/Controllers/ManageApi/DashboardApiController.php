<?php

namespace App\Http\Controllers\ManageApi;

use Illuminate\Http\Request;
use App\Http\Controllers\ManageApiController;
use App\Merchant;
use App\MerchantUser;
use Illuminate\Support\Facades\DB;
use App\Post;
use Carbon\Carbon;
/**
 * @resource Root dashboard
 */
class DashboardApiController extends ManageApiController
{
    /**
     * Dassh board api
     * $type = {users-by-date, posts-by-date}
     */
    public function dashBoard($subDomain, $type, Request $request)
    {
        if ($type == "users-by-date") {
            $merchant = Merchant::where('sub_domain', $request->subDomain)->first();
            $merchant_id = $merchant->id;
            $start_time = $request->start_time;
            $end_time = $request->end_time;
            if ($start_time == null) {
                $start_time = date("Y-m-d", strtotime("-6 days"));
                $end_time = date("Y-m-d");
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
            $total_users = $merchant->users()->count();
            return $this->success([
                "charts" => $new_user_by_date,
                "total" => $total_users,
            ]);
        }

        if ($type == "posts-by-date") {
            $merchant = Merchant::where('sub_domain', $request->subDomain)->first();
            $merchant_id = $merchant->id;
            $start_time = $request->start_time;
            $end_time = $request->end_time;
            if ($start_time == null) {
                $start_time = date("Y-m-d", strtotime("-6 days"));
                $end_time = date("Y-m-d");
            }
            $date_array = createDateRangeArray(strtotime($start_time), strtotime($end_time));
            $posts_by_date_temp = Post::select(DB::raw('DATE(created_at) as date,count(1) as num'))
                ->whereBetween(DB::raw('DATE(created_at)'), [$start_time, $end_time])
                ->where('merchant_id', $merchant_id)
                ->groupBy(DB::raw('DATE(created_at)'))->pluck('num', 'date');

            $posts_by_date = [];
            foreach ($date_array as $date) {
                if (isset($posts_by_date_temp[$date])) {
                    $posts_by_date[] = [
                        "date" => $date,
                        "count" => $posts_by_date_temp[$date]
                    ];
                } else {
                    $posts_by_date[] = [
                        "date" => $date,
                        "count" => 0
                    ];
                }
            }
            $total_posts = $merchant->posts()->count();
            return $this->success([
                "charts" => $posts_by_date,
                "total" => $total_posts
            ]);
        }
    }
}
