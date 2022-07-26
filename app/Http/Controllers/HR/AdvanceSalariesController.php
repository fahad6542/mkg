<?php

namespace App\Http\Controllers\HR;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\AdvanceSalaries;
use Illuminate\Http\Request;
use DataTables;

class AdvanceSalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()){
        
        $data = Employee::leftJoin('advance_salaries', 'employees.id', '=' ,'advance_salaries.employee_id')
        ->where('employees.delete_status','1' && 'employees.is_active','1') 
        ->select('employees.name','advance_salaries.id', 'advance_salaries.date','advance_salaries.monthly_salary','advance_salaries.prevous_advance_salary','advance_salaries.exp_loan_repay','advance_salaries.exp_bal_sal_of_month','advance_salaries.new_advance','advance_salaries.new_exp_bal_sal_of_month','advance_salaries.remarks') 
        ->get();
           return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){
                        if($row->id != null)
                        {
                           $btn = '<a  href="' . route("Advance_salary.edit",$row->id) .'"  class="edit btn btn-primary btn-sm edit-btn">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';
                        //    $btn = $btn.' <a  href="' . route("employee.show",$row->id) .'"  class="view btn btn-success btn-sm view-btn">View</a>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

       return view('HR.Advance_Salaries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $emp = Employee::where('delete_status',1)->get();    
        return view('HR.Advance_Salaries.create',compact('emp'));
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
            'date'                         => 'required',
            'monthly_salary'               => 'required',
            'prevous_advance_salary'       => 'required',
            'exp_loan_repay'               => 'required',
            'exp_bal_sal_of_month'         => 'required',
            'new_advance'                  => 'required',
            'new_exp_bal_sal_of_month'     => 'required',
            'remarks'                      => 'required'
     
          ]);

         
            $attendance_salary=new AdvanceSalaries;
            $attendance_salary->employee_id=$request->employee_id;
            $attendance_salary->date=$request->date;
            $attendance_salary->monthly_salary=$request->monthly_salary;
            $attendance_salary->prevous_advance_salary=$request->prevous_advance_salary;
            $attendance_salary->exp_loan_repay=$request->exp_loan_repay;
            $attendance_salary->exp_bal_sal_of_month=$request->exp_bal_sal_of_month;
            $attendance_salary->new_advance=$request->new_advance;
            $attendance_salary->new_exp_bal_sal_of_month=$request->new_exp_bal_sal_of_month;
            $attendance_salary->remarks=$request->remarks;
            $attendance_salary->save();
            return redirect()->route('Advance_salary.index')
            ->with('success','Advance Salary successfully Added.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvanceSalaries  $advanceSalaries
     * @return \Illuminate\Http\Response
     */
    public function show(AdvanceSalaries $advanceSalaries)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvanceSalaries  $advanceSalaries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::where('delete_status',1)->get();
        $advanceSalaries=AdvanceSalaries::find($id);
        return view('HR.Advance_Salaries.edit',compact('advanceSalaries','emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvanceSalaries  $advanceSalaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $advanceSalaries=AdvanceSalaries::find($id);
    
        request()->validate([

            'employee_id'                  => 'required',
            'date'                         => 'required',
            'monthly_salary'               => 'required',
            'prevous_advance_salary'       => 'required',
            'exp_loan_repay'               => 'required',
            'exp_bal_sal_of_month'         => 'required',
            'new_advance'                  => 'required',
            'new_exp_bal_sal_of_month'     => 'required',
            'remarks'                      => 'required'
     
          ]);

          $advanceSalaries->employee_id=$request->employee_id;
          $advanceSalaries->date=$request->date;
          $advanceSalaries->monthly_salary=$request->monthly_salary;
          $advanceSalaries->prevous_advance_salary=$request->prevous_advance_salary;
          $advanceSalaries->exp_loan_repay=$request->exp_loan_repay;
          $advanceSalaries->exp_bal_sal_of_month=$request->exp_bal_sal_of_month;
          $advanceSalaries->new_advance=$request->new_advance;
          $advanceSalaries->new_exp_bal_sal_of_month=$request->new_exp_bal_sal_of_month;
          $advanceSalaries->remarks=$request->remarks;
          $advanceSalaries->update();
          return redirect()->route('Advance_salary.index')
          ->with('success','Attendance Salary Update successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvanceSalaries  $advanceSalaries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdvanceSalaries::find($id)->delete();
        return response()->json(['success'=>'Advance deleted successfully.']);
    }


   public function fetchData(Request $request){

    $data=Employee::where('id', $request->id)->first();



    $res = [
        'data'=>$data,
    ];
    
    return response()->json($res);


}


}
