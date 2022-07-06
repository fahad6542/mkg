<?php



namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceSheetController extends Controller
{
     public function index(){

      
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Attendance_sheet.index',compact('data'));

     }

    public function show(Request $request)
    {

        // $emp_data = DB::table('employees')
        // ->select('employees', 'attendances', 'leaves')
        // ->where($request->employee_id, '=' ,'employees.id') 
        // ->leftJoin('leaves', 'employees.id', '=', 'leaves.employee_id')
        // ->leftJoin('attendances', 'employees.id', '=', 'attendances.employee_id')
        // ->get();


        $attendance_data = Attendance::leftJoin('leaves', 'attendances.employee_id', '=' ,'leaves.employee_id')
        ->select('attendances.*','leaves.title', 'leaves.Date')
        ->get();


// dd( $attendance_data );

        // $attendance_data=Attendance::where('employee_id' , $request->employee_id)->get();
        // $leave_data=Leave::where('employee_id' , $request->employee_id)->get();


       
       
        request()->validate([

            'employee_id'                   => 'required',
            'month'                         => 'required',
            'year'                          => 'required'
     
          ]);


     $month=$request->month;
     $year=$request->year;
     
    if ($month == 1 || $month == 3 || $month == 5
    || $month == 7 || $month == 8 || $month == 10
    || $month == 12)
     
     {
   
    $number_of_days=31;

    $days=array();
    $date=array();

 
        for ($x = 1; $x <= $number_of_days; $x++) {
            $days[$x] = date("l", strtotime($x . "-" . $month . "-" . $year));
            $date[$x] = date("Y-m-d", strtotime($x . "-" . $month . "-" . $year));
            }
            
        

        $data  = Employee::where('delete_status',1)->get();
        return view('HR.Attendance_sheet.index',compact('data','attendance_data','days','date'));

    }

 
 if ($month == 2 && $year % 4 == 0){
    
    $number_of_days = 29;
    $data=array();
    $date=array();


    for ($x = 1; $x <= $number_of_days; $x++)
    {
        $days[$x]=date("l", strtotime($x . "-" . $month . "-" . $year));
        $date[$x] = date("Y-m-d", strtotime($x . "-" . $month . "-" . $year));
        
    }
    $data = Employee::where('delete_status',1)->get();
    return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date'));
}


 else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {

    $number_of_days=30;
    $data=array();
    $date=array();

    for ($x = 1; $x <= $number_of_days; $x++)
    {
        $days[$x]=date("l", strtotime($x . "-" . $month . "-" . $year));
        $date[$x] = date("Y-m-d", strtotime($x . "-" . $month . "-" . $year));
        
    }

    $data = Employee::where('delete_status',1)->get();
    return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date'));
          
 }

 else if ($month == 2 ) {

    $number_of_days=28;
    $data=array();
    $date=array();

    for ($x = 1; $x <= $number_of_days; $x++)
       {
        $days[$x]=date("l", strtotime($x . "-" . $month . "-" . $year));
        $date[$x] = date("Y-m-d", strtotime($x . "-" . $month . "-" . $year));
        
        }
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date'));
               
      }  
    
}
}















    
