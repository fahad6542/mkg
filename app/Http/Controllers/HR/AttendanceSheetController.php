<?php



namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\Holiday;
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

        $attendance_data['holidays']=Holiday::all();
        

        $month=$request->month;
        $aa_year=$request->year;


        $attendance_data['emp'] = Employee::where('id' , $request->employee_id)->first();
        $attendance_data['attendance']= Attendance::where('employee_id' , $request->employee_id)->get();
        $attendance_data['leave']= Leave::where('employee_id' , $request->employee_id)->get();
       $total_holidays=count($attendance_data['holidays']);
       $emp_name=Employee::where('id',$request->employee_id)->first();
       $total_numer=count($attendance_data);

              
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
            
        
       
        $data= Employee::where('delete_status',1)->get();
        return view('HR.Attendance_sheet.index',compact('data','attendance_data','days','date','emp_name','total_numer','number_of_days','total_holidays','month','aa_year'));

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
    return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date','emp_name','total_numer','number_of_days','total_holidays','month','aa_year'));
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
    return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date','emp_name','total_numer','number_of_days','total_holidays','month','aa_year'));
          
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
        return view('HR.Attendance_sheet.index',compact('data','days','attendance_data','date','emp_name','total_numer','number_of_days','total_holidays','month','aa_year'));
               
      }  
    
}
}















    
