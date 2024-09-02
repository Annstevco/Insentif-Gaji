<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MonthController extends Controller
{
    public function show($nip)
    {
        $months = DB::table('presensi')
            ->select(DB::raw('MONTH(date) as month'), DB::raw('SUM(GREATEST(0, TIMESTAMPDIFF(HOUR, time_in, time_out) - 8)) as total_overtime'))
            ->where('nip', $nip)
            ->groupBy(DB::raw('MONTH(date)'))
            ->orderBy(DB::raw('MONTH(date)'), 'asc')
            ->get();

        return view('riwayat', ['months' => $months, 'nip' => $nip]);
    }
}
