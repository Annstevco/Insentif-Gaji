<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function show($nip, $month)
    {
        $details = DB::table('presensi')
            ->where('nip', $nip)
            ->whereMonth('date', $month)
            ->orderBy('date', 'asc')
            ->get();

        return view('details.show', ['details' => $details]);
    }
}
