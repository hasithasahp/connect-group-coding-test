<?php 

namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function getEmployeeAttendance(int $emp_id)
    {
        $attendance = Attendance::select(
                        'id',
                        'checkin_at', 
                        'checkout_at', 
                        'worked_hours',
                    )->where('emp_id', $emp_id);

        return [ 'attendance' => $attendance->get(), 'worked_hours' => $attendance->sum('worked_hours') ];
    }

    public function getAttendance()
    {
        return Attendance::select(
            'id', 
            'emp_id', 
            'checkin_at', 
            'checkout_at', 
            'worked_hours'
        )->with('employee:id,name')->get();
    }
}