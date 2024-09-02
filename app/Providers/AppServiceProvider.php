<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $nip = Auth::user()->nip;

                $presensisData = DB::table('presensis')
                    ->select('nip', DB::raw('SUM(GREATEST(0, TIMESTAMPDIFF(HOUR, time_in, time_out) - 8)) as total_overtime'))
                    ->groupBy('nip')
                    ->orderBy('total_overtime', 'ASC')
                    ->get();

                if ($presensisData->isNotEmpty()) {
                    $totalCount = $presensisData->count();
                    $rankings = [];
                    $userRank = 'Not Ranked';

                    // Calculate rank for each user and store it in the array
                    foreach ($presensisData as $index => $data) {
                        $rankings[$data->nip] = $totalCount - $index;
                        if ($data->nip === $nip) {
                            $userRank = $rankings[$data->nip];
                        }
                    }

                    $view->with('userRank', $userRank)
                        ->with('rankings', $rankings)
                        ->with('hasData', true);
                } else {
                    $view->with('userRank', 'No Data')
                        ->with('rankings', [])
                        ->with('hasData', false);
                }
            }
        });
    }
}
