@extends('layouts/contentLayoutMaster')

@section('title', 'Employee Management')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" type="text/css" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
  
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
<style type="text/css">
  .label-info{
    background-color: #7367f0;
  }

  .form-control::-ms-input-placeholder {
    font-weight: 500;
}
</style>
@endsection
@section('content')

<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row">




    <div class="col-9"> 
      <div class="card">

       

        <div class="card-header">
          <h4 class="card-title">Employee Information</h4>
        </div>

      <form action="{{route('employee.store')}}" method="POST" id="employee_form">
        @csrf

        

        <div class="card-body">
       
            <div class="row">
              <div class="col-md-4 col-12">
                
                <div class="mb-1">
                  <input
                    type="text"
                    
                    class="form-control @error('code') error @enderror"
                    placeholder="Employee Code*"
                    name="code" value="{{old('code')}}"
                  />
                  @error('code')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
               
              </div>
          
             
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('branch_code') error @enderror"
                    placeholder="Employee Account"
                    name="branch_code"   value="{{old('branch_code')}}"
                  />
                  @error('branch_code')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('account_number') error @enderror"
                    placeholder=""
                    name="account_number"  value="{{old('account_number')}}"
                  />
                  @error('account_number')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-1">
                <button type="submit" class="btn btn-outline-secondary">Ac</button>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('name') error @enderror"
                    placeholder="Employee Name*"
                    name="name" value="{{old('name')}}"
                  />
                  @error('name')
                  <div class="danger text-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <input
                    type="text"
                   
                    class="form-control  @error('urdu_name') error @enderror"
                    placeholder="Employee Name In Urdu"
                    name="urdu_name"   value="{{old('urdu_name')}}"
                  />
                  @error('urdu_name')
                      <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <input
                    type="password"
                    class="form-control  @error('password') error @enderror"
                    placeholder="Password"
                    name="password" value="{{old('password')}}"
                  />
                  @error('password')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="Col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('father_name') error @enderror"
                    placeholder="Father Name"
                    name="father_name" value="{{old('father_name')}}"
                  />
                  @error('father_name')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1 ">
                    <select class="select2 form-select @error('department') error @enderror" id="select2-Dimension"  name="department" value="{{old('department')}}">
                      <option disabled selected>Department</option>
                      <option value="1"  >2</option>
                    </select>
                </div>
                @error('department')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
             
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">                   
                    <select class="select2 form-select  @error('branch_id') error @enderror" name="branch_id" value="{{old('$branch->name')}}">
                        <option disabled selected>Select Bussiness Unit</option>
                        @foreach ($branch as $item)
                        <option   value="{{ $item->id }}">{{$item->name}}</option>
                        @endforeach
                      </select>
                      @error('branch_id')
                      <div class="danger text-danger">{{ $message }}</div>
                      @enderror

    
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                    <select class="select2 form-select  @error('staff_group') error @enderror" id="select2-Dimension"  name="staff_group"  value="{{old('department')}}">
                      <option disabled selected >Staff Group</option>
                      <option value="1"  >2</option>
                    </select>
                    @error('staff_group')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror

                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                    <select class="select2 form-select  @error('designation') error @enderror" id="select2-Dimension" name="designation" value="{{old('designation')}}">
                      <option disabled selected>Designation</option>
                      <option value="1"  >2</option>  
                    </select>
                    @error('designation')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                    <select class="select2 form-select  @error('designation_urdu') error @enderror" id="select2-Dimension" name="designation_urdu"  value="{{old('designation_urdu')}}">
                      <option disabled selected>Designation In Urdu</option>
                    </select>
                    @error('designation_urdu')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              {{-- <div class="col-md-3 col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Cashier
                    </label>
                  </div>
              </div> --}}
              {{-- <div class="col-md-3 col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Enable Sale Disc
                    </label>
                  </div>
              </div> --}}




              
              <div class="col-md-3 ">
                 <div class="form-check">
                    <label class="form-check-label">
                    Validity Date
                    </label>
                  </div>
              </div>
            
              <div class="col-md-3">
                <div class="mb-1">
                  <input
                    type="date"
                    class="form-control  @error('validity_Date') error @enderror"
                    name="validity_Date"  value="{{old('validity_Date')}}"
                   
                  />
                  @error('validity_Date')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3">
                 <div class="form-check">
                    <label class="form-check-label" style="width: 120px;">
                   
                    Birth Date
                    </label>
                  </div>
              </div>
            
              <div class="col-md-3">
                <div class="mb-1">
                  <input
                    type="date"
                    class="form-control  @error('birth_date') error @enderror"
                    name="birth_date"  value="{{old('birth_date')}}"
                  />
                  @error('birth_date')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3">
                 <div class="form-check">
                    <label class="form-check-label"> 
                    Hire Date
                    </label>
                  </div>
              </div>
              <div class="col-md-3 ">
                <div class="mb-1">
                  <input
                    type="date"
                    class="form-control  @error('hire_date') error @enderror"
                    name="hire_date"   value="{{old('hire_date')}}"
                  />
                  @error('hire_date')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md- col-12">
                <div class="mb-1">
                    <select class="select2 form-select  @error('spo') error @enderror" name="spo" value="{{old('spo')}}">
                      <option value="1" name="spo">SPO</option>
                      <option value="2" name="spo">SPO2</option>
                    </select>
                    @error('spo')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('address') error @enderror"
                    placeholder="Address"
                    name="address"  value="{{old('address')}}"
                  />
                  @error('address')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-12">
               <div class="mb-1">
                <textarea
                  class="form-control  @error('address_urdu') error @enderror"
                  rows="3"
                  placeholder="Address In Urdu"
                  name="address_urdu"  value="{{old('address_urdu')}}"
                ></textarea>
                @error('address_urdu')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
               </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('city') error @enderror"
                    name="city" value="{{old('city')}}"
                    placeholder="City" 
                  />
                  @error('city')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('country') error @enderror"
                    name="country" value="{{old('country')}}"
                    placeholder="Country" 
                  />
                  @error('country')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('home_phone_no') error @enderror"
                    name="home_phone_no" value="{{old('home_phone_no')}}"
                    placeholder="Home Phone"
                  />
                  @error('home_phone_no')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control @error('mobile_no') error @enderror"
                    name="mobile_no" value="{{old('mobile_no')}}"
                    placeholder="Mobile Phone" 
                  />
                  @error('mobile_no')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control @error('email') error @enderror"
                    name="email" value="{{old('email')}}"
                    placeholder="Email Address" 
                  />
                  @error('email')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>             
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control @error('nic') error @enderror"
                    name="nic"  value="{{old('nic')}}"
                    placeholder="NIC No" 
                  />
                  @error('nic')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    id="company-column"
                    class="form-control  @error('remarks') error @enderror"
                    name="remarks"  value="{{old('remarks')}}"
                    placeholder="Remarks"
                  />
                  @error('remarks')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3 col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                   
                    Resign Date
                    </label>
                  </div>
              </div>
            
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <input
                    type="date"
                    class="form-control @error('resign_date') error @enderror"
                    name="resign_date" value="{{old('resign_date')}}"
                   
                  />
                  @error('resign_date')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3 col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="salaried_emp"
                        value="1"
                    />
                    Salaried Employee
                    </label>
                  </div>
              </div>
              <div class="col-md-3 col-12">
                 <div class="custom-control custom-radio custom-control-inline">
                 <input
                 type="radio" 
                 name="salary_type"  value="{{old('salary_type')}}"
                 value="1" 
                 class="custom-control-input  @error('salary_type') error @enderror">
                 <label 
                 class="custom-control-label" 
                 for="customRadioInline1"
                 >
                 @error('salary_type')
                 <div class="danger text-danger">{{ $message }}</div>
                 @enderror
                 Monthly Salary</label>
                  </div>
              </div>
              <div class="col-md-3 col-12">
                 <div class="custom-control custom-radio custom-control-inline">
                 <input 
                 type="radio" 
                 id="customRadioInline2" 
                 name="salary_type" value="{{old('salary_type')}}"
                 value="0"
                 class="custom-control-input  @error('salary_type') error @enderror">
                 <label 
                 class="custom-control-label" 
                 for="customRadioInline2"
                 >
                 @error('salary_type')
                 <div class="danger text-danger">{{ $message }}</div>
                 @enderror
                 Daily Wagers</label>
                  </div>
              </div>
              
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('monthly_salary') error @enderror"
                    name="monthly_salary" value="{{old('monthly_salary')}}"
                    placeholder="Monthly Salary" 
                  />
                  @error('monthly_salary')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    id="company-column @error('daily_works_hours') error @enderror"
                    class="form-control"
                    name="daily_works_hours" value="{{old('daily_works_hours')}}"
                    placeholder="Daily Work Hours"
                  />
                  @error('daily_works_hours')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control @error('over_time_hours') error @enderror"
                    name="over_time_hours" value="{{old('over_time_hours')}}"
                    placeholder="OT / Hour"
                  />
                  @error('daily_works_hours')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>             
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('loan_payable') error @enderror"
                    name="loan_payable" value="{{old('loan_payable')}}"
                    placeholder="Loan Payable"
                  />
                  @error('loan_payable')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    id="company-column"
                    class="form-control  @error('advance_salary') error @enderror"
                    name="advance_salary" value="{{old('advance_salary')}}"
                    placeholder="Advance Salary"
                  />
                  @error('advance_salary')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control   @error('loan_installment') error @enderror"
                    name="loan_installment"  value="{{old('loan_installment')}}"
                    placeholder="Loan Installment"
                  />
                  @error('loan_installment')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>             
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <input
                    type="text"
                    class="form-control  @error('exp_salary_payable') error @enderror "
                    name="exp_salary_payable"  value="{{old('exp_salary_payable')}}"
                    placeholder="Exp. Salary Payable"
                  />
                  @error('exp_salary_payable')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="">
                  <label for="" class="">Shift Time In (hh:mm):</label>
                </div>
                
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                <input type="number" id="" class="form-control @error('exp_salary_payable') error @enderror" placeholder="01" name="shift_time_in_hh" value="{{old('shift_time_in_hh')}}" min="01" max="23">
                </div>
                  @error('exp_salary_payable')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                <input type="number" id="" class="form-control @error('shift_time_in_mm') error @enderror" Placeholder="00" name="shift_time_in_mm" min="00" max="59" value="{{old('shift_time_in_mm')}}">
                </div>
                @error('shift_time_in_mm')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <label for="" class="">Early Relaxation Time(Mins):</label>
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                  <input min="00" max="59"
                    type="number"
                    class="form-control  @error('early_relaxation_time') error @enderror"
                    name="early_relaxation_time"  value="{{old('early_relaxation_time')}}"
                  />
                  @error('early_relaxation_time')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <label for="" class="" style="width: 175px;">Shift Time Out(hh:mm):</label>
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                <input type="number" id="" class="form-control @error('shift_time_out_hh') error @enderror" placeholder="01" name="shift_time_out_hh" min="01" max="23" value="{{old('shift_time_out_hh')}}">
                </div>
                @error('shift_time_out_hh')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                <input type="number" id="" class="form-control @error('shift_time_out_mm') error @enderror" Placeholder="00" name="shift_time_out_mm" min="00" max="59" value="{{old('shift_time_out_mm')}}">
                </div>
                @error('shift_time_out_mm')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-1">
                  <label for="" class="" >Late Relaxation Time(Mins):</label>
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                  <input 
                    type="number" min="00" max="59"
                    class="form-control  @error('late_relaxation_time') error @enderror"
                    name="late_relaxation_time" value="{{old('late_relaxation_time')}}"
                   
                  />
                  @error('late_relaxation_time')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
              <!--  -->

           

              <div class="col-12">
                
              </div>
            </div>
        
        </div>
      </div>
              <div class="col-12 d-flex justify-content-end mb-1">
                <button type="submit" class="btn btn-primary me-1">Submit</button>

                <button type="reset" class="btn btn-outline-secondary me-1">Reset</button>
                <button type="reset" class="btn btn-outline-secondary">Make Copy</button>
       
              </div>
            </form>
           
    </div>





    <div class="col-3">
     
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
          <form class="form">
            <div class="row">
              <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="first-name-column">Product Image</label>
                    <a  data-bs-toggle="modal" data-bs-target="#large">Add Image</a>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="first-name-column">Galery Images</label>
                  <a href="">Add Image</a>
                </div>
              </div>
              <div class="col-12 mb-1">
                <button type="reset" class="col-12 btn btn-outline-secondary me-1 mb-1">Browse</button>

                <button type="reset" class="col-12 btn btn-outline-secondary me-1 mb-1">Save It</button>
                <button type="reset" class="col-12 btn btn-outline-secondary">Remove</button>

              </div>
            
                
             
            </div>
          </form>
        </div>

      </div>

      <div class="card">
       
        <div class="card-body">
          <form class="form">
            <div class="row">
              
            
            <div class="col-12">
                <div class="mb-1">
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  placeholder=""
                ></textarea>
              </div>
              </div>
              <div class="col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Bio Matrix Scanned
                    </label>
                  </div>
              </div>
              <div class="col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Bio Matrix Verified
                    </label>
                  </div>
              </div>
                <div class="col-sm-12 mt-1">
                    <button type="submit" class="btn btn-primary">Bio Matrix</button>
                </div>
                <div class="col-sm-12 mt-1">
                    <button type="submit" class="btn btn-outline-secondary">Reset Bio Matrix</button>
                </div>
                <div class="col-12 mt-1">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Manual Attendance
                    </label>
                 </div>
                </div>
              
              <div class="col-md-12 col-12 mt-1">
                <div class="mb-1">
                <label for="">I Face Employee ID:</label>
                  <input
                    type="number"
                    id="company-column"
                    class="form-control"
                    name="company-column"
                   
                  />
                </div>
              </div>
              <div class="col-12">
                 <div class="form-check">
                    <label class="form-check-label">
                    <input
                        type="checkbox"
                        id="company-column"
                        class="form-check-input"
                        name="company-column"
                    />
                    Style 2
                    </label>
                 </div>
                </div>  
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>


</section>

<!-- Basic Floating Label Form section end -->
@endsection

@section('vendor-script')

  <!-- vendor files -->
  <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
  
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script>
    var jqForm = $('#employee_form');
    //jquery form validation
$(function () {
    'use strict';

    // jQuery Validation
    // --------------------------------------------------------------------
    if (jqForm.length) {
        jqForm.validate({
            rules: {
            'code': {
                required: true
            },
            'name': {
                required: true,
            },
            'password': {
                required: true
            },
            'email': {
                required: true,
                email: true
            }
            }
        });
    }

});


  </script>
@endsection

<!-- Product Image Modal -->



              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add File</button>
                    </div>
                  </div>
                </div>
              </div>   


              