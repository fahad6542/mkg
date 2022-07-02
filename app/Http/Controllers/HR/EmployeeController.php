<?php

namespace App\Http\Controllers\HR;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        
        if ($request->ajax()) {
            $data = Employee::where('delete_status',1)->get();      
            return Datatables::of($data)
                    ->addIndexColumn()                
                    ->addColumn('action', function($row){

                           $btn = '<a  href="' . route("attendance.edit",$row->id) .'"  class="edit btn btn-primary btn-sm edit-btn">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';
                           $btn = $btn.' <a  href="' . route("employee.show",$row->id) .'"  class="view btn btn-success btn-sm view-btn">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        //
       
       
        return view('HR.Employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
      $user=Auth::user();
        // dd($user);
        $branch=Branch::where('company_id',$user->company_id)->get();
        return view('HR.Employee.create',compact('branch'));

    }

    public function store(Request $request)
    {

        // dd($request->late_relaxation_time);

      request()->validate([

       'code'                  => 'required',
       'name'                  => 'required|string|min:1|max:255',
       'password'              => 'required',
       'email'                 => 'required|email|unique:users',
       'early_relaxation_time' =>'max:59',
       'late_relaxation_time'  =>'max:59',
       
    
     ]);

        $salaried_emp=0;
        if($request->salaried_emp!=null){
            $salaried_emp=1;
        }

        $shift_time_in=null;     
        if(isset($request->shift_time_in_hh) && isset($request->shift_time_in_mm)){
            $shift_time_in=$request->shift_time_in_hh.":".$request->shift_time_in_mm;
        }

        $shift_time_out=null;     
        if(isset($request->shift_time_out_hh) && isset($request->shift_time_out_mm)){
            $shift_time_out=$request->shift_time_out_hh.":".$request->shift_time_out_mm;
        }

        Employee::create([

           
            'code'                      => $request->code,
            'branch_code'               => $request->branch_code,
            'account_number'            => $request->account_number,
            'name'                      => $request->name,
            'password'                  => Hash::make($request->password),
            'urdu_name'                 => $request->urdu_name,
            'father_name'               => $request->father_name,

            'department'                => $request->department,
            'branch_id'                 => $request->branch_id,
            'staff_group'               => $request->staff_group,
            'designation'               => $request->designation,
            'designation_urdu'          => $request->designation_urdu,
            'validity_Date'             => $request->validity_Date,
            'birth_date'                => $request->birth_date,
            'hire_date'                 => $request->hire_date,

            'spo'                       => $request->spo,
            'address'                   => $request->address,
            'address_urdu'              => $request->address_urdu,
            'city'                      => $request->city,
            'country'                   => $request->country,
            'home_phone_no'             => $request->home_phone_no,
            'mobile_no'                 => $request->mobile_no,
            'email'                     => $request->email,
            'nic'                       => $request->nic,
           

            'remarks'                       => $request->remarks,
            'resign_date'                   => $request->resign_date,
            'salaried_emp'                  => $salaried_emp,
            'salary_type'                   => $request->salary_type,
            'monthly_salary'                => $request->monthly_salary,
            'daily_works_hours'             => $request->daily_works_hours,
            'over_time_hours'               => $request->over_time_hours,
            'loan_payable'                  => $request->loan_payable,

            'advance_salary'                => $request->advance_salary,
            'loan_installment'              => $request->loan_installment,
            'exp_salary_payable'            => $request->exp_salary_payable,
            'shift_time_in'                 => $shift_time_in,
            'shift_time_out'                => $shift_time_out,
            'early_relaxation_time'         => $request->early_relaxation_time,
            'late_relaxation_time'          => $request->late_relaxation_time,
         

        ]);
         return redirect()->route('employee.index')
                        ->with('success','Employee added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('HR.Employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $user=Auth::user();
        $branch=Branch::where('company_id',$user->company_id)->get();
        return view('HR.Employee.edit',compact('employee','branch'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        request()->validate([

            'code'                  => 'required',
            'name'                  => 'required|string|min:1|max:255',
            'password'              => 'required',
            'email'                 => 'required|email|unique:users',
            'early_relaxation_time' =>'max:59',
            'late_relaxation_time'  =>'max:59',
                
          ]);

            if($employee->password==$request->password){
                $password=$request->password;
                
            }
        
            else{
                $password=Hash::make($request->password);
                }
     
             $salaried_emp=0;
             if($request->salaried_emp!=null){
             $salaried_emp=1;
             }
            
     
             $shift_time_in=null;     
             if(isset($request->shift_time_in_hh) && isset($request->shift_time_in_mm)){
                 $shift_time_in=$request->shift_time_in_hh.":".$request->shift_time_in_mm;
             }
     
             $shift_time_out=null;     
             if(isset($request->shift_time_out_hh) && isset($request->shift_time_out_mm)){
                 $shift_time_out=$request->shift_time_out_hh.":".$request->shift_time_out_mm;
             }

             $employee->code=$request->code;
             $employee->branch_code=$request->branch_code;
             $employee->account_number=$request->account_number;
             $employee->name=$request->name;
             $employee->password=$password;
             $employee->urdu_name=$request->urdu_name;
             $employee->father_name=$request->father_name;
             $employee->department=$request->department;
             $employee->branch_id=$request->branch_id;
             $employee->staff_group=$request->staff_group;
             $employee->designation=$request->designation;

   
             $employee->designation_urdu=$request->designation_urdu;
             $employee->validity_Date=$request->validity_Date;
             $employee->birth_date=$request->birth_date;
             $employee->hire_date=$request->hire_date;
             $employee->spo=$request->spo;
             $employee->address=$request->address;

            
             $employee->address_urdu=$request->address_urdu;
             $employee->city=$request->city;
             $employee->country=$request->country;
             $employee->home_phone_no=$request->home_phone_no;
             $employee->mobile_no=$request->mobile_no;
             $employee->email=$request->email;

             
             $employee->address_urdu=$request->address_urdu;
             $employee->city=$request->city;
             $employee->country=$request->country;
             $employee->home_phone_no=$request->home_phone_no;
             $employee->mobile_no=$request->mobile_no;
             $employee->nic=$request->nic;
            
             $employee->remarks=$request->remarks;
             $employee->resign_date=$request->resign_date;
             $employee->salaried_emp=$salaried_emp;
             $employee->salary_type=$request->salary_type;
             $employee->monthly_salary=$request->monthly_salary;
             $employee->daily_works_hours=$request->daily_works_hours;

             $employee->over_time_hours=$request->over_time_hours;
             $employee->loan_payable=$request->loan_payable;
             $employee->advance_salary=$request->advance_salary;
             $employee->loan_installment=$request->loan_installment;
             $employee->exp_salary_payable=$request->exp_salary_payable;
             $employee->shift_time_in=$shift_time_in;

             $employee->shift_time_out=$shift_time_out;
             $employee->early_relaxation_time=$request->early_relaxation_time;
             $employee->late_relaxation_time=$request->late_relaxation_time;
             $employee->is_active=$request->is_active;
           
             $employee->update();

          return redirect()->route('employee.index')
            ->with('success','Employee updated  successfully.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete_status=0;
        $emp= Employee::find($id);
        $emp->delete_status = 0;
        $emp->save();
        return response()->json(['success'=>'Units deleted successfully.']);
    }
}
