<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'date', 'time_in', 'time_out', 'overtime', 'nominal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    public function getOvertimeHours()
    {
        $time_in = Carbon::createFromFormat('H:i', $this->time_in);
        $time_out = Carbon::createFromFormat('H:i', $this->time_out);
        $total_hours = $time_out->diffInHours($time_in);
        return max(0, $total_hours - 8);
    }

    public function calculateOvertime()
    {
        // Convert the time_in and time_out to Carbon instances
        $time_in = Carbon::createFromFormat('H:i', $this->time_in);
        $time_out = Carbon::createFromFormat('H:i', $this->time_out);

        // Ensure that time_out is greater than time_in
        if ($time_out->lessThan($time_in)) {
            return 0; // or handle this case as needed
        }

        // Calculate the total working hours
        $total_hours = $time_out->diffInHours($time_in);

        // If the total hours is more than 8, calculate the overtime
        $overtime_hours = max(0, $total_hours - 8);

        // Apply the overtime formula
        $overtime_payment = $overtime_hours * 1;

        return $overtime_payment;
    }
}
