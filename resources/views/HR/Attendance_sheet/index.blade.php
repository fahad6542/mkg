

@extends('layouts/contentLayoutMaster')
@section('title', 'Attendance Sheet')

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

<form action="{{route('show')}}" method="post" id="employee_form">
@csrf
   
<div class="row" id="table-bordered">
    <div class="col-12 ">
      <div class="card">
      <div class="row">

        
        <div class="col-md-3 mb-1" style="margin-top: 22px; margin-left:10px;">
            <select class="select2 form-select  @error('employee_id') error @enderror"  style="" name="employee_id" id="selectem">
                <option disabled selected>Select Employee</option>
                @foreach ($data as $item)             
                <option   value="{{ $item->id }}" >{{$item->name}}</option>            
                @endforeach
              </select>  
              @error('employee_id')
              <div class="danger text-danger">{{ $message }}</div>
              @enderror
             </div>


             <div class="col-md-3 mb-1" style="margin-top: 22px; margin-left:10px;">
                <select class="select2 form-select  @error('month') error @enderror"  style="" name="month" id="selectm">
                    <option disabled selected>Select Month</option>                          
                    <option value="1">Janaury</option>
                    <option value="2"> February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>          
                  </select>  
                  @error('month')
                  <div class="danger text-danger">{{ $message }}</div>
                  @enderror
                 </div>

                 <div class="col-md-3 mb-1" style="margin-top: 22px; margin-left:10px;">
                    <select class="select2 form-select  @error('year') error @enderror"  style="" name="year" id="selecty">
                        <option disabled selected>Select Year</option>                          
                        <option >2020</option>
                        <option>2021</option>
                        <option value="2022">2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                        <option>2029</option>
                        <option>2030</option>
                        <option>2031</option>
                        <option>2032</option>
                        <option>2033</option>
                        <option>2034</option>
                        <option>2035</option>
                        <option>2036</option>
                        <option>2037</option>
                        <option>2038</option>
                        <option>2039</option>
                        <option>2040</option>    
                      </select>  
                      @error('year')
                      <div class="danger text-danger">{{ $message }}</div>
                      @enderror
                     </div>

                
                <div class="col-md-2 mb-1 mt-2"><button type="submit" class="btn btn-primary me-1">Submit</button></div>
           </div>
        </div>
    </div>
</div>

<!-- Bordered table start -->
  <div class="row" id="table-bordered">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-12">
                @if(isset($emp_name))
                 <h4 class="card-title">Employee Name : {{$emp_name->name}}</h4>
                 @else
                 <h4 class="card-title">Employee Name :</h4>
                 @endif
              </div>
           </div>

         
             <div class="col-md-12">
                <h4 class="card-title">Designation   : </h4>
            </div>
        
        
        </div>
        <div class="card-body">
          {{-- <p class="card-text">
            Add <code>.table-bordered</code> for borders on all sides of the table and cells. For Inverse Dark Table, add
            <code>.table-dark</code> along with <code>.table-bordered</code>.
          </p> --}}
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Daily Date</th>
                <th>Days</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Minutes</th>
                <th>Hours</th>
              </tr>
            </thead>
            <tbody>
            @php
                    $counta=0;
                    $hh = 0;
            @endphp
          
              @if(isset($number_of_days))
              @for ($i = 1; $i < $number_of_days; $i++)
              {{-- @if (Now()->format('Y-m-d') > $date[$i]) --}}
              @php
               $check=0;
              @endphp
              <tr>
              <td>
               <span class="fw-bold">{{$date[$i]}}</span>
              </td>     
              <td>
                <span class="fw-bold">{{date('l', strtotime($date[$i]))}}</span>
              </td>
             @foreach($attendance_data['holidays'] as $ad)
              @if($date[$i] == $ad->Date)
              <td colspan="2" class="text-center">
                <span class="fw-bold" >{{ $ad->title }}</span>
              </td>
              @php
                $check=1;
              @endphp
              @endif
              @endforeach
              @foreach($attendance_data['leave'] as $ad)
              @if($date[$i] == $ad->Date)
              <td colspan="2" class="text-center">
                <span class="fw-bold" >{{ $ad->title }}</span>
              </td>
              @php
                $check=1;
              @endphp
              @endif
              @endforeach
              @foreach($attendance_data['attendance'] as $ad)
              @if($date[$i] == $ad->Date)


              @php

                  $check_in=date('g:i A', strtotime($ad->shift_time_in));
                  $checK_out=date('g:i A', strtotime($ad->shift_time_out));
              
               
//                    if ($check_out==null){
//                      dd('hy')
//                     } 
// else{
// dd('not null');
// }


               
              @endphp
       
           

       
              <td>
                <span class="fw-bold" >{{$check_in}}</span>
              </td>
              <td>
                <span class="fw-bold" >{{$checK_out}}</span>
              </td>

@php







$time1 = $ad->shift_time_in;
$time1=strtotime($time1);

// $time1=(date('H:i:s', $time1));
$time2= $ad->shift_time_out;
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
// $s = $s/60;
// $m = $m+$h+$s;
// $h = $m/60;
// $h = round($h ,2);
// $hh = $hh + $h;
@endphp

@if ($time2==null)
    
<td>
  <span class="fw-bold" ></span>
</td>
<td>
  <span class="fw-bold" ></span>
</td>

@else
<td>
  <span class="fw-bold" >{{$m}} Minuts</span>
</td>
<td>
  <span class="fw-bold" >{{$hours}}:{{$minutes}}</span>
</td>
@endif



              @php
                $check=1;
              @endphp
              @endif
              @endforeach
              @if($check==0 && Now()->format('Y-m-d') >= $date[$i])
                @if($date[$i] > $attendance_data['emp']->hire_date )
                <td colspan="2" class="text-center">
                  <span class="fw-bold" >Absent</span>
                </td>
                @php
                  $counta++;
                @endphp
                @elseif($date[$i] == $attendance_data['emp']->hire_date)
                <td colspan="2" class="text-center">
                  <span class="fw-bold" >Hiring Date</span>
                </td>
                @else
                <td colspan="2" class="text-center">
                  <span class="fw-bold" >Not Joined</span>
                </td>
                @endif
              @endif
              </tr>
            @endfor
           @endif
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>




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
            'month': {
                required: true,
            },
            'year':{
                required: true
            },
            }
        });
    }

});


  </script>
<script>
  $(document).ready(function(){ 
  @if(isset($attendance_data['emp']))
  @php
  $iidd = $attendance_data['emp']->id;
  @endphp
  $('#selectem').val({{ $iidd }}).change();
  $('#selectm').val({{ $month }}).change();
  $('#selecty').val({{ $aa_year }}).change();
  @endif
  });
</script>
@endsection

<!-- Product Image Modal -->



        