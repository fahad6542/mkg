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

<form action="{{route('show')}}" method="post">
@csrf
   
<div class="row" id="table-bordered">
    <div class="col-12 ">
      <div class="card">
      <div class="row">

        <div class="col-md-3 mb-1" style="margin-top: 22px; margin-left:10px;">
            <select class="select2 form-select  @error('employee_id') error @enderror"  style="" name="employee_id" id="selectem">
                <option disabled selected>Select Employee</option>
                @foreach ($data as $item)             
                <option   value="{{ $item->id }}">{{$item->name}}</option>            
                @endforeach
              </select>  
              @error('employee_id')
              <div class="danger text-danger">{{ $message }}</div>
              @enderror
             </div>
             <div class="col-md-3 mb-1" style="margin-top: 22px; margin-left:10px;">
                <select class="select2 form-select  @error('month') error @enderror"  style="" name="month" id="selectem">
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
                    <select class="select2 form-select  @error('year') error @enderror"  style="" name="year" id="selectem">
                        <option disabled selected>Select Year</option>                          
                        <option >2020</option>
                        <option>2021</option>
                        <option>2022</option>
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
          <h4 class="card-title">Bordered table</h4>
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
                <th>Days</th>
                <th>Time In</th>
                {{-- <th>Users</th> --}}
                <th>Time Out</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img
                    src="{{asset('images/icons/angular.svg')}}"
                    class="me-75"
                    height="20"
                    width="20"
                    alt="Angular"
                  />
                  <span class="fw-bold">Angular Project</span>
                </td>
                <td>Peter Charls</td>
                {{-- <td>
                  <div class="avatar-group">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Lilian Nenez"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                  </div>
                </td> --}}
                <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                      <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <i data-feather="edit-2" class="me-50"></i>
                        <span>Edit</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i data-feather="trash" class="me-50"></i>
                        <span>Delete</span>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              {{-- <tr>
                <td>
                  <img
                    src="{{asset('images/icons/react.svg')}}"
                    class="me-75"
                    height="20"
                    width="20"
                    alt="React"
                  />
                  <span class="fw-bold">React Project</span>
                </td>
                <td>Ronald Frest</td>
                <td>
                  <div class="avatar-group">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Lilian Nenez"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                  </div>
                </td>
                <td><span class="badge rounded-pill badge-light-success me-1">Completed</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                      <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <i data-feather="edit-2" class="me-50"></i>
                        <span>Edit</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i data-feather="trash" class="me-50"></i>
                        <span>Delete</span>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <img
                    src="{{asset('images/icons/vuejs.svg')}}"
                    class="me-75"
                    height="20"
                    width="20"
                    alt="Vuejs"
                  />
                  <span class="fw-bold">Vuejs Project</span>
                </td>
                <td>Jack Obes</td>
                <td>
                  <div class="avatar-group">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Lilian Nenez"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset("images/portrait/small/avatar-s-7.jpg")}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                  </div>
                </td>
                <td><span class="badge rounded-pill badge-light-info me-1">Scheduled</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                      <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <i data-feather="edit-2" class="me-50"></i>
                        <span>Edit</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i data-feather="trash" class="me-50"></i>
                        <span>Delete</span>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <img
                    src="{{asset('images/icons/bootstrap.svg')}}"
                    class="me-75"
                    height="20"
                    width="20"
                    alt="Bootstrap"
                  />
                  <span class="fw-bold">Bootstrap Project</span>
                </td>
                <td>Jerry Milton</td>
                <td>
                  <div class="avatar-group">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Lilian Nenez"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar pull-up my-0"
                      title="Alberto Glotzbach"
                    >
                      <img
                        src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                        alt="Avatar"
                        height="26"
                        width="26"
                      />
                    </div>
                  </div>
                </td>
                <td><span class="badge rounded-pill badge-light-warning me-1">Pending</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                      <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">
                        <i data-feather="edit-2" class="me-50"></i>
                        <span>Edit</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i data-feather="trash" class="me-50"></i>
                        <span>Delete</span>
                      </a>
                    </div>
                  </div>
                </td>
              </tr> --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Bordered table end -->


 
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

@endsection

<!-- Product Image Modal -->



        