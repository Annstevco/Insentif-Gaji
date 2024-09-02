<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure to include your User model
use Illuminate\Support\Facades\DB; // Required for DB operations
use App\Models\Presensi;


class NavigationController extends Controller
{
    public function showAdminPage(Request $request)
    {
        $searchTerm = $request->input('pencarian'); // Get the search term from the request

        if ($searchTerm) {
            // Search by 'name' or 'nip' if search term is provided
            $users = User::where('name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('nip', 'LIKE', "%{$searchTerm}%")
                ->get();
        } else {
            // Fetch all users if no search term is provided
            $users = User::all();
        }

        // Calculate rankings
        $presensisData = Presensi::select('nip', DB::raw('SUM(GREATEST(0, TIMESTAMPDIFF(HOUR, time_in, time_out) - 8)) as total_overtime'))
            ->groupBy('nip')
            ->orderBy('total_overtime', 'ASC')
            ->get();

        $rankings = [];
        $totalCount = $presensisData->count();
        foreach ($presensisData as $index => $data) {
            $rankings[$data->nip] = $totalCount - $index;
        }

        // Attach rankings to users
        foreach ($users as $user) {
            $user->rank = $rankings[$user->nip] ?? 'Not Ranked';
        }

        // Sort users by rank
        $sortedUsers = $users->sortBy('rank');

        return view('admin-page', ['users' => $sortedUsers]);
    }

    public function showKelolaInsentif()
    {
        return view('kelolainsentif');
    }

    public function showRiwayatPage()
    {
        return view('riwayat');
    }

    public function showDetailPage()
    {
        return view('detail');
    }
}
