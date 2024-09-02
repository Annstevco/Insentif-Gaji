<?php

// In UserController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Division;
use Carbon\Carbon; // Ensure you have this at the beginning of your file


class UserController extends Controller
{

    public function showMyDetail($month = null)
    {
        $nip = Auth::user()->nip;
        return $this->showDetail($nip, $month);
    }

    public function showMyRiwayat()
    {
        $nip = Auth::user()->nip;
        return $this->showRiwayat($nip);
    }

    public function showRiwayat($nip)
    {
        $user = User::where('nip', $nip)->firstOrFail();
        $divisionName = $user->division;

        // Fetch the division based on the user's division name
        $division = Division::where('name', $divisionName)->first();
        if (!$division) {
            return response()->json(['error' => 'Division not found for the user.'], 404);
        }
        $divisionIncentive = $division->incentive;

        $presensis = Presensi::where('nip', $nip)->orderBy('date', 'asc')->get();
        $monthlyOvertime = [];

        foreach ($presensis as $presensi) {
            $month = Carbon::createFromFormat('d/m/Y', $presensi->date)->format('F');

            if (!isset($monthlyOvertime[$month])) {
                $monthlyOvertime[$month] = [
                    'overtime_hours' => 0,
                    'overtime_payment' => 0,
                ];
            }

            // Use the division incentive for overtime calculation
            $overtimeHours = $presensi->calculateOvertime(); // Make sure this returns overtime hours
            $overtimePayment = $overtimeHours * $divisionIncentive;

            $monthlyOvertime[$month]['overtime_hours'] += $overtimeHours;
            $monthlyOvertime[$month]['overtime_payment'] += $overtimePayment;
        }

        return view('riwayat', compact('user', 'monthlyOvertime'));
    }



    public function showDetail($nip, $month = null)
    {
        $user = User::where('nip', $nip)->firstOrFail();
        $divisionName = $user->division;

        $division = Division::where('name', $divisionName)->first();

        if (!$division) {
            // Handle the case where the division is not found
            return response()->json(['error' => 'Division not found for the user.'], 404);
        }
        $query = Presensi::where('nip', $nip);

        if ($month) {
            try {
                // Trying to create a date from the month name, assuming the day is 01 and the year is current year
                $date = Carbon::createFromFormat('F', $month);
                // Add a where clause to filter the presences by the month
                $query->whereRaw("MONTH(STR_TO_DATE(date, '%d/%m/%Y')) = ?", [$date->month]);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Invalid month. Ensure the month is a valid full month name.', 'message' => $e->getMessage()], 400);
            }
        }

        $presensis = $query->orderBy('date', 'asc')->get();
        $divisionIncentive = $division->incentive;

        foreach ($presensis as $presensi) {
            // Assuming calculateOvertime() is a method in the Presensi model that calculates overtime hours
            $overtimeHours = $presensi->calculateOvertime();

            // Calculate overtime payment using division incentive
            $overtimePayment = $overtimeHours * $divisionIncentive;

            // Add calculated values to the presensi object
            $presensi->overtime_hours = $overtimeHours;
            $presensi->overtime_payment = $overtimePayment;
        }

        return view('detail', compact('presensis', 'user'));
    }

    public function showPresensi()
    {
        $nip = Auth::user()->nip;
        $presensis = Presensi::where('nip', $nip)->get();

        return view('detail', compact('presensis'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Get user by ID or fail
        $user->delete(); // Delete the user

        return redirect()->route('admin-page')->with('success', 'User deleted successfully');
    }
}
