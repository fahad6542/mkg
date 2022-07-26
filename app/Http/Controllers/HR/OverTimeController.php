<?php

namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\OverTime;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leave;
use DataTables;


class OverTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if ($request->ajax() ) { 
          
          
            $data = OverTime::join('employees', 'over_times.employee_id', '=' ,'employees.id')
            ->select('over_times.*', 'employees.name') 
            ->get();
            
   
               return DataTables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', function($row){
   
                           $btn = '<a  href="' . route("leave.edit",$row->id) .'"  class="edit btn btn-primary btn-sm edit-btn">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';
   
                               return $btn;
                       })
                       ->rawColumns(['action'])
                       ->make(true);
           }
   
          
           return view('HR.over_time.index');
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Employee::where('delete_status',1)->get();
        return view('HR.over_time.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
       

    
        // request()->validate([
        //     'employee_id'                         => 'required',
        //     'date '                               => 'required',
        //     'check_in'                            => 'required',
        //     'check_out '                          => 'required',
        //     'overtime '                           => 'required',
        //   ]);

          $over_time=new OverTime;
          $over_time->employee_id=$request->employee_id;
          $over_time->date=$request->date;
          $over_time->check_in=$request->check_in;
          $over_time->check_out=$request->check_out;
          $over_time->overtime=$request->overtime;
          



          $check=OverTime::where('employee_id',$request->employee_id)->where( 'date'  ,  $request->date)->first();
 
          if(isset($check)){
          
              return redirect()->route('overtime.create')
              ->with('error','Over Time Already Added.');
          }
          
          else{
          
               $over_time->save();
              return redirect()->route('overtime.index')
              ->with('success','Attendance successfully.');
          }





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OverTime  $overTime
     * @return \Illuminate\Http\Response
     */
    public function show(OverTime $overTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OverTime  $overTime
     * @return \Illuminate\Http\Response
     */
    public function edit(OverTime $overTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OverTime  $overTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OverTime $overTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OverTime  $overTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OverTime::find($id)->delete();
        return response()->json(['success'=>'OverTime deleted successfully.']);
    }


    public function overtime(Request $request){


     
        $data=Attendance::where('employee_id', $request->id)->where('Date' , $request->date)->first();
        $leave=Leave::where('employee_id', $request->id)->where('Date' , $request->date)->first();
     
if($data !=null){
    $check_in=date('h:i A', strtotime( $data->shift_time_in));
    $checK_out=date('h:i:A', strtotime($data->shift_time_out));

    $time1 = $data->shift_time_in;
    $time1=strtotime($time1);
    $time2= $data->shift_time_out;
    $time2=strtotime($time2);
    $diff=$time2 - $time1;

    //YERAS
$years = floor($diff / (365*60*60*24));
//Months
$months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));

//Days
$days = floor(($diff - $years * 365*60*60*24 -$months*30*60*60*24)/ (60*60*24));

$days_in_minutes=$days*24*60;
$days_in_hours = floor($days / 60);

//hours
$hours = floor(($diff - $years * 365*60*60*24- $months*30*60*60*24 - $days*60*60*24)/ (60*60));

//minutes
$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24- $hours*60*60)/ 60);

//Seconds
$seconds = floor(($diff - $years * 365*60*60*24- $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));


$m = $hours*60+$minutes+$seconds+$days_in_minutes;


$days_in_hours = floor($m / 60);
$h=$days_in_hours;
$overtime_h=$hours-8;
$overtime=$overtime_h.':'.$minutes;
  
$res = [
    'data'=>$data,
    'leave'=>$leave,
    'check_in'=>$check_in,
    'checK_out'=>$checK_out,
    'hours'=>$hours,
    'minutes'=>$minutes,
    'overtime'=>$overtime,
];

return response()->json($res);

}

 else{
    $res = [
        'data'=>$data,
        'leave'=>$leave,
        'check_in'=>0,
        'checK_out'=>0,
        'hours'=>0,
        'minutes'=>0,
    ];
    
    return response()->json($res);

 }


          
               




    }


}
