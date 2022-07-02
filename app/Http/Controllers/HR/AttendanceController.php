<?php



namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;

class AttendanceController extends Controller
{
   
    public function index(Request $request)
    
    {

        if ($request->ajax()){

   
        $data = Employee::leftJoin('attendances', 'employees.id', '=' ,'attendances.employee_id')
        ->where('employees.delete_status','1' && 'employees.is_active','1') 
        ->select('employees.name','attendances.id', 'attendances.Date','attendances.shift_time_in','attendances.shift_time_out')
        ->get();
           return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){
                        if($row->id != null)
                        {
                           $btn = '<a  href="' . route("attendance.edit",$row->id) .'"  class="edit btn btn-primary btn-sm edit-btn">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';
                        //    $btn = $btn.' <a  href="' . route("employee.show",$row->id) .'"  class="view btn btn-success btn-sm view-btn">View</a>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    return view('HR.Attendance.index');

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Employee::where('delete_status',1)->get();
        $attendance=Attendance::all();

        return view('HR.Attendance.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        request()->validate([

            'employee_id'                  => 'required',
            'Date'                         => 'required',
            'shift_time_in'                => 'required'
     
          ]);

            $attendance=new Attendance;
            $attendance->employee_id=$request->employee_id;
            $attendance->Date=$request->Date;
            $attendance->shift_time_in=$request->shift_time_in;
            $attendance->shift_time_out=$request->shift_time_out;


$check=Attendance::where('employee_id',$request->employee_id)->where( 'Date'  ,  $request->Date)->first();
            
if(isset($check)){

    return redirect()->route('attendance.create')
    ->with('error','Attendance Already Mark.');
}

else{

    $attendance->save();
    return redirect()->route('attendance.index')
    ->with('success','Attendance successfully.');
}




      

        

        

        //   Attendance::create([

           
        //     'employee_id'                         => $request->employee_id,
        //     'Date'                                => $request->Date,
        //     'shift_time_in'                       => $request->shift_time_in,
        //     'shift_time_out'                      => $request->shift_time_out,
            
          
        //   ]);

         
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Attendance.edit',compact('attendance','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        request()->validate([

            'employee_id'                  => 'required',
            'Date'                         => 'required',
            'shift_time_in'                => 'required'
     
          ]);

          $attendance->employee_id=$request->employee_id;
          $attendance->Date=$request->Date;
          $attendance->shift_time_in=$request->shift_time_in;
          $attendance->shift_time_out=$request->shift_time_out;
          $attendance->update();
          
          return redirect()->route('attendance.index')
            ->with('success','Attendance update successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::find($id)->delete();
        return response()->json(['success'=>'Holiday deleted successfully.']);
    }
}
