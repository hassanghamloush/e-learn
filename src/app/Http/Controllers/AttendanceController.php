<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Attendance ;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Course\ScheduleCreate;
use App\Models\Course;
use App\Models\Schedule;

use Carbon\Carbon;



use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function showattendance(){

        $user = Auth::user();
        $data = [
            'user' => $user,
            'attendance' => null,
            'registered_attendance' => null
        ];
$last_attendance = $user->attendance->last();

        if($last_attendance) {
            if($last_attendance->created_at->format('d') == Carbon::now()->format('d')){
                $data['attendance'] = $last_attendance;
                if($last_attendance->registered)
                    $data['registered_attendance'] = 'yes';
            }
        }
        return view('attendance.createatttendance')->with($data);
    }

    public function location(Request $request) {

        $response = Http::get('https://nominatim.openstreetmap.org/reverse?format=geojson&lat='.$request->lat.'&lon='.$request->lon);

        return $response->json()['features'][0]['properties']['display_name'];
    }

    public function storeEntry(Request $request, $user_id){
        $attendance = new Attendance([
            'user_id' => $user_id,
            'entry_ip' => $request->ip(),
            'entry_location' => $request->entry_location,
            'created_at' => Carbon::now()
    ]);

    $attendance->save();
    $request->session()->flash('success', 'Attendance entry successfully logged');
    return redirect('/student/attendance')->with('user', Auth::user());

    }

    public function storeExit(Request $request, $attendance_id) {

        // $attendance = Attendance::findOrFail($attendance_id)->get();
        $attendance=DB::table('attendances')->where('id',$attendance_id)->update([
            'exit_ip' => $request->ip(),
            'exit_location' => $request->exit_location,
            'registered' => 'yes',
            'updated_at' => Carbon::now()

        ]);

        $request->session()->flash('success', 'Attendance exit successfully logged');
        return redirect('/student/attandence')->with('user', Auth::user());
    }


    public function allattendance(){
        return view('attendance.allattendace');
    }
    public function createAttendance(){
        return view('attendance.createatttendance');
    }
}
