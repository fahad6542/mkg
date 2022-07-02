<?php


namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


     if ($request->ajax() ) { 
       
        $data = Leave::join('employees', 'leaves.employee_id', '=' ,'employees.id')
        ->select('leaves.*', 'employees.name') 
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

        //
      
      
        
       
        return view('HR.Leaves.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Leaves.create',compact('data'));
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

            'employee_id'                   => 'required',
            'title'                         => 'required',
            'Date'                          => 'required'
     
          ]);

          Leave::create([
            'employee_id'                          => $request->employee_id,
            'title'                                => $request->title,
            'Date'                                 => $request->Date,
            'description'                          => $request->description,
          
          ]);

          return redirect()->route('employee.index')
            ->with('success','Application create successfully.');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        $data = Employee::where('delete_status',1)->get();
        return view('HR.Leaves.edit',compact('leave','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        request()->validate([

            'employee_id'                   => 'required',
            'title'                         => 'required',
            'Date'                          => 'required'
     
          ]);

          $leave->employee_id=$request->employee_id;
          $leave->title=$request->title;
          $leave->Date=$request->Date;
          $leave->description=$request->description;
          $leave->update();
          
         
          return redirect()->route('leave.index')
            ->with('success','Leave update successfully.');
     
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::find($id)->delete();
        return response()->json(['success'=>'Holiday deleted successfully.']);
    }
}
