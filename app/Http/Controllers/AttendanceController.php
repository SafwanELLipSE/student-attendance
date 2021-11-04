<?php

namespace App\Http\Controllers;

use App\Student;
use App\Student_attendance;
use App\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $days = Carbon::now()->daysInMonth;
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $checkAttendance = Attendance::where('event_date', Carbon::today())->where('isTaken',1)->get();

        $count = 0;
        for($i = 1; $i <= $days; $i++){
            $dayName = now()->setYear($currentYear)->setMonth($currentMonth)->setDay($i)->format('l');
            if(($dayName != "Friday") && ($dayName != "Saturday")){
                $attendanceDates[] = $dayName;
                $count++;
            }
        }

        return view('attendances.create',[
            'checkAttendance' => $checkAttendance,
            'attendanceDates' => $attendanceDates,
            'weeklyHoliday' => $days - $count,
            'students' => Student::all(),
        ]);
    }
    public function createAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_ids'  => 'required',
        ]);

        if ($validator->fails()) {
            alert()->warning('Error occurred', $validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $date = $request->post('student_date');
        $studentIds = $request->post('student_ids');

        $checkAttendance = Attendance::where('event_date', Carbon::today())->where('isTaken', 1)->get();
        if(!count($checkAttendance)){
            $today = new Attendance;
            $today->event_date = $date;
            $today->isTaken = 1;
            $today->save();
        }
        else{
            Alert::warning('Error', 'Successfully Attendance has been taken Today.');
            return redirect()->back();
        }

        if(count($studentIds)){
            foreach($studentIds as $studentId){
                $attendance = new Student_attendance;
                $attendance->student_id = $studentId;
                $attendance->attendance_id = $today->id;
                $attendance->save();
            }
        }

        Alert::success('Success', 'Successfully Attendance has been submitted.');
        return redirect()->back();
    }
}
