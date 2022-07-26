@extends('layouts/contentLayoutMaster')

@section('title', 'Add Over Time')

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

<div class="content-wrapper container-xxl p-0" data-select2-id="13">
      
      
    <div class="content-body" data-select2-id="12">
      
      
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form" data-select2-id="multiple-column-form">
<div class="row">
  <div class="col-12"> 
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Over/Under Time Entry</h4>
      </div>
      <div class="card-body" data-select2-id="11">
        <form class="form" data-select2-id="10"  action="{{route('overtime.store')}}" method="POST" id="employee_form">
          @csrf
          <div class="row" data-select2-id="9">
            {{-- <div class="col-12">
              <div class="mb-1">
                <div class="position-relative"><select class="select2 form-select" id="select2-Dimension" tabindex="0" aria-hidden="false">
                  <option value="">Session Title</option>
                </select></div>
              </div>
            </div> --}}
            <div class="col-12" data-select2-id="8">
                <div class="col-md-12 mb-1">
                    <select class="select2 form-select  @error('employee_id') error @enderror"  name="employee_id" id="emp_id">
                        <option disabled selected>Select Employee</option>
                        @foreach ($data as $item)
                      
                        <option   value="{{ $item->id }}">{{$item->name}}</option>
                    
                        @endforeach
                      </select>
                     
                      @error('employee_id')
                      <div class="danger text-danger">{{ $message }}</div>
                      @enderror
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="mb-1">
                <Label>Select Date</Label>
                <input type="date" id="myDate" class="form-control" name="date">
              </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="mb-1">
                    <br>
                    <button type="button"  class="form-control  btn-success me-1 " id='btnss'>Check</button>
                  </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1"></div>
              </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                  <Label>Check In</Label>
                  <input type="text" id="check_in" class="form-control" name="check_in">
                </div>
              </div>

              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <Label>Check Out</Label>
                  <input type="text" id="check_out" class="form-control" name="check_out">
                </div>
              </div>

              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <Label>Over Time</Label>
                  <input type="text" id="overtime" class="form-control" name="overtime">
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
</div>
</form>

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
            'title': {
                required: true
            },
            'Date': {
                required: true,
            },
           
           
            }
        });
    }

});


$('#btnss').on('click',function()
{
var id=$('#emp_id').val();
var date =$("#myDate").val();

$.ajax({

url:"{{url('Over-time')}}",
type:"GET",
data:{
         id:id,
         date:date,
_token: '{{ csrf_token()}}', 
},
dataType: 'json',
success:function(response)
{
        $('#check_in').val(0);
        $('#check_out').val(0);
        $('#overtime').val(0);
    var resultData = response.data;
    var leaveData =response.leave;
    var check_in=response.check_in;
    var check_out=response.checK_out;
    var Total_hours=response.hours;
    var total_minutes=response.minutes;
    var overtime=response.overtime;
    
    


    if(resultData !=null && leaveData == null){

        $('#check_in').val(check_in);
        $('#check_out').val(check_out);
        $('#overtime').val(overtime);

       
    }
    if(resultData == null && leaveData != null){
        $('#check_in').val(leaveData.title);
        $('#check_out').val(leaveData.title);
    }

    if(resultData == null && leaveData == null){
        $('#check_in').val('Abbsent');
        $('#check_out').val('Abbsent');

    }
}


});
 });



</script>
@endsection

<!-- Product Image Modal -->



        