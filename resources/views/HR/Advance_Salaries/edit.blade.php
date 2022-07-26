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



<div class="content-wrapper container-xxl p-0">
       
    <div class="content-body">
      
      
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
<div class="row">
  <div class="col-12"> 
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Advance Salary</h4>
      </div>
      <div class="card-body">
        <form action="{{route('Advance_salary.update',$advanceSalaries->id)}}" method="POST" id="employee_form">
         @csrf
         @method('PUT')

         {{-- <input type="hidden" name="id" value="{{$advanceSalaries->id}}"> --}}
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <input type="number" id="id" class="form-control" placeholder="id*" name="id" value="{{$advanceSalaries->employee_id}}">
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div class="mb-1">
                <label for="">Advance Date*</label>
              </div>
            </div>
           
            <div class="col-md-4 col-12">
              <div class="mb-1">
                <input type="date" id="" class="form-control @error('date') error @enderror"  name="date" value="{{$advanceSalaries->date}}">
                @error('date')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="mb-1">
                  <label for="">Select Employee*</label>
                </div>
              </div>
            <div class="col-12">
              <div class="mb-1">
                <select class="select2 form-select  @error('employee_id') error @enderror"  name="employee_id" id="employee_id" >
                    <option disabled selected>Select Employee</option>
                    @foreach ($emp as $item)
                    <option   value="{{ $item->id }}" {{ $item->id == $advanceSalaries->employee_id ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('employee_id')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">Monthly Salary*</label>
                <input type="text" id="monthly_salary" class="form-control  @error('monthly_salary') error @enderror" placeholder="Monthly Salary*" name="monthly_salary" value="{{$advanceSalaries->monthly_salary}}">
                @error('monthly_salary')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="col-md-6 col-12">
             
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">Previous Advance*</label>
                <input type="text" id="prevous_advance_salary" class="form-control  @error('prevous_advance_salary') error @enderror" placeholder="Previous Advance*" name="prevous_advance_salary" value="{{$advanceSalaries->prevous_advance_salary}}">
                @error('prevous_advance_salary')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">Exp Loan Repay*</label>
                <input type="number" id="" class="form-control  @error('exp_loan_repay') error @enderror" placeholder="Exp Loan Repay*" name="exp_loan_repay"  value="{{$advanceSalaries->exp_loan_repay}}">
                @error('exp_loan_repay')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror  
            </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">Exp. Bal. Salary of The Month*</label>
                <input type="number" id="" class="form-control  @error('exp_bal_sal_of_month') error @enderror"  placeholder="Exp. Bal. Salary of The Month*" name="exp_bal_sal_of_month"  value="{{$advanceSalaries->exp_bal_sal_of_month}}">
                @error('exp_bal_sal_of_month')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror  
            </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">New Advance*</label>
                <input type="number" id="" class="form-control @error('new_advance') error @enderror" placeholder="New Advance*" name="new_advance" value="{{$advanceSalaries->new_advance}}">
                @error('new_advance')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror 
            </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label for="">New Exp. Bal. Salary Of The Month*</label>
                <input type="number" id="" class="form-control @error('new_exp_bal_sal_of_month') error @enderror"  placeholder="New Exp. Bal. Salary Of The Month*" name="new_exp_bal_sal_of_month" value="{{$advanceSalaries->new_exp_bal_sal_of_month}}">
              </div>
              @error('new_exp_bal_sal_of_month')
              <div class="danger text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 col-12">
            </div>
            <div class="col-12">
              <div class="mb-1">
                <label for="">Remarks*</label>
                <input type="text" id="remarks" class="form-control  @error('remarks') error @enderror"  placeholder="Remarks*" name="remarks" value="{{$advanceSalaries->remarks}}">
                @error('remarks')
                <div class="danger text-danger">{{ $message }}</div>
                @enderror  
            </div>
             </div>
            <div class="col-12">             
            </div>
          </div>
    
      </div>
    </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
              <button type="reset" class="btn btn-outline-secondary me-1 waves-effect">Reset</button>
            </div>
  </div>
</form>
</div>


</section>



<!-- Basic Floating Label Form section end -->
    </div>
  </div>


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
            'employee_id': {
                required: true
            },
            'date': {
                required: true,
            },
            'monthly_salary': {
                required: true
            },
            'prevous_advance_salary': {
                required: true,
            },
            'exp_loan_repay': {
                required: true,
            },
            'exp_bal_sal_of_month': {
                required: true,
            },
            'new_advance': {
                required: true,
            },
            'new_exp_bal_sal_of_month': {
                required: true,
            },
            'remarks': {
                required: true,
            }
            }
        });
    }

});









$('#employee_id').on('change',function() {
var  id = this.value;
$.ajax({
url: "{{url('fetch-data')}}",
type:"GET",
data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
dataType: 'json',
success:function(response)
 {
    var resultData = response.data;
     $('#id').val(resultData.id);
     $('#monthly_salary').val(resultData.monthly_salary);
     $('#prevous_advance_salary').val(resultData.advance_salary);
    }
})
});







  </script>
@endsection



              