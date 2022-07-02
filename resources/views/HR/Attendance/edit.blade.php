@extends('layouts/contentLayoutMaster')

@section('title', 'Employee Attendance Update')

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

<section id="multiple-column-form">
    <div class="row">
      <div class="col-9"> 
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Attendance Update</h4>
          </div>
  
        <form action="{{route('attendance.update',$attendance->id)}}" method="POST" id="employee_form">
          @csrf
          @method('PUT')


          <div class="card-body">
              <div class="row">
               
                <div class="col-md-6 mb-1 mt-2">
                    <select class="select2 form-select  @error('employee_id') error @enderror "  name="employee_id" id="selectem">
                        <option disabled selected>Select Employee</option>
                        @foreach ($data as $item)
                        <option  value="{{ $item->id }}" {{ $item->id == $attendance->employee_id ? 'selected' : '' }}>{{$item->name}}
                        @endforeach
                      </select>
                      @error('employee_id')
                      <div class="danger text-danger">{{ $message }}</div>
                      @enderror
              </div>
    
                 <div class="col-md-6 mb-1">
                    <label class="form-label" for="fp-date-time">Date</label>
                    <input type="text" id="current_date" name="Date" value="{{$attendance->Date}}" class="form-control flatpickr-date-time flatpickr-input active  @error('Date') error @enderror" placeholder="YYYY-MM-DD" readonly="readonly">
                    @error('Date')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror
          
                  </div>
                </div>
                <div class="row">
                      <div class="col-md-6 mb-1">
                        <label class="form-label" for="fp-time">Shift Time In</label>
                        <input type="text" id="shift-time-in" name="shift_time_in" class="form-control flatpickr-time text-start flatpickr-input" value="{{$attendance->shift_time_in}}" placeholder="HH:MM" readonly="readonly">
                           @error('Date')
                    <div class="danger text-danger">{{ $message }}</div>
                    @enderror
          
                      </div>

                      <div class="col-md-6 mb-1">
                        <label class="form-label" for="fp-time">Shift Time Out</label>
                        <input type="text" id="shift-time-out" name="shift_time_out" class="form-control flatpickr-time text-start flatpickr-input" placeholder="HH:MM" value="{{$attendance->shift_time_out}}" readonly="readonly">
                      </div>
                </div> 
            </div>
         </div>
                <div class="col-12 d-flex justify-content-end mb-1">
                  <button type="submit" class="btn btn-success me-1">Update</button>
                  <button type="reset" class="btn btn-outline-secondary me-1">Reset</button>
                 
         
                </div>
            </form>
        </div>
      </div>
  
  
</section>

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

$('#selectem').on('change' , function(){
    document.getElementById('current_date').value = new Date().toISOString().slice(0,10);
    time = new Date();
    hh = time.getHours();
    mm = time.getMinutes();
    if(hh<10)
    {
        hh = '0'+hh;
    }
    if(mm<10)
    {
        mm = '0'+mm;
    }
    c_time = hh + ':' + mm;
    document.getElementById('shift-time-in').value = c_time;
    // $('#validity_Date').datepicker();
    // $('#validity_Date').datepicker('setDate' , new Date());
});


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
            'Date': {
                required: true,
            },
            'shift_time_in': {
                required: true
            },
            
            }
        });
    }

});


  </script>
@endsection

<!-- Product Image Modal -->



        