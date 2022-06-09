@extends('layouts/contentLayoutMaster')

@section('title', 'Add Class Information')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')



<!-- Basic multiple Column Form section start -->
<section id="ajax-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
         <!-- Button trigger modal -->
         <div class="card-header border-bottom">
          <h4 class="card-title">Add Class Information</h4>
           <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
				<form class="form" method="post" action="{{route('classes.store')}}">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Add Class Information</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <section id="">
                            <div class="row">
                                <div class="col-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                    <form class="form">
                                        <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                            <label class="" for="">Class Name*</label>
                                            <input
                                                type="text"
                                                id=""
                                                class="form-control mt-1 @error('name') is-invalid @enderror"
                                                name="name"
                                                value="{{old('name')}}"
                                                placeholder="Class Name*"
                                            />
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                            <label class="" for="">
                                                <input
                                                    type="checkbox"
                                                    id=""
                                                    class="checkbox @error('is_active') is-invalid @enderror"
                                                    name="is_active"
                                                    placeholder=""
                                                />
                                                
                                            InActive*</label>
                                                @error('is_active')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                                                            
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                             <label class="" for="">Description*</label>
                                                <textarea
                                                    class="form-control mt-1  @error('description') is-invalid @enderror"
                                                    id=""
                                                    rows="3"
                                                    name="description"
                                                    placeholder="Description"
                                                    >{{old('description')}}</textarea>
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                                
                            </div>
                            </section>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        <!--  -->
        <div class="card-datatable">
          <table class="datatables-ajax table table-responsive">
            <thead>
              <tr>
                <th>Series Name</th>                
                <th>Description</th>                
                <th>Action</th>
              </tr>
            </thead>
            <tbody> 
              @forelse ($classes as $class)
                <tr>
                
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->description }}</td>

                  <td>
                    <a href="" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr> @empty
                <tr>
                  <td colspan="5">No class found</td>
                </tr> 
                
              @endforelse 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Basic Floating Label Form section end -->
@endsection