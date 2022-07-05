<?php



namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceSheetController extends Controller
{
    public function index(){
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Attendance_sheet.index',compact('data'));

    }

    public function show(Request $request)
    {

     $month=$request->month;
     $year=$request->year;



//      if ($year % 400 == 0){
//       print("It is a leap year");
//      }
    
//   else if ($year % 100 == 0){

//       print("It is not a leap year");
//   }
     
//   else if ($year % 4 == 0){

//       print("It is a leap year");
//   }
     
//   else{

//       print("It is not a leap year");

//   }
    

     if ($month == 1 || $month == 3 || $month == 5
     || $month == 7 || $month == 8 || $month == 10
     || $month == 12) {
     echo ("31 Days.");
 }

 
 if ($month == 2 && $year % 4 == 0){
    
        echo ("29 Days.");
    
   
}

 // Check for 30 Days
 else if ($month == 4 || $month == 6
          || $month == 9 || $month == 11) {
     echo ("30 Days.");
 }
 else if ($month == 2 ) {
     echo ("28 Days.");
 }



else if ($month == 2 ) {
    echo ("28 Days.");
}
  

    }
    }
