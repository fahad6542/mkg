@extends('layouts/contentLayoutMaster')

@section('title', 'Add Publisher Information')

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
          <h4 class="card-title">Add Publisher Information</h4>
           <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
					      <form class="form" method="post" action="{{route('publisher.store')}}">
                 @csrf
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Add Publisher Information</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <section id="">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              
                              <div class="card-body">
                                <form class="form">
                                  <div class="row">
                                    
                                    <div class="col-md-12 col-12">
                                      <div class="">
                                        <label class="" for="">Publisher Name*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('name') is-invalid @enderror"
                                          name="name"
                                          value="{{old('name')}}"
                                          placeholder="Publisher Name*"
                                        />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="mt-1" for="">Name in Urdu*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('name_urdu') is-invalid @enderror"
                                          name="name_urdu"
                                          value="{{old('name_urdu')}}"
                                          placeholder="Name In Urdu*"
                                        />
                                        @error('name_urdu')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">Address*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('address') is-invalid @enderror"
                                          name="address"
                                          value="{{old('address')}}"
                                          placeholder="Address*"
                                        />
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">Address in Urdu*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('address_in_urdu') is-invalid @enderror"
                                          name="address_in_urdu"
                                          value="{{old('address_in_urdu')}}"
                                          placeholder="Address In Urdu*"
                                        />
                                        @error('address_in_urdu')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">Abbreviation*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('abbreviation') is-invalid @enderror"
                                          name="abbreviation"
                                          value="{{old('abbreviation')}}"
                                          placeholder="Abbreviation*"
                                        />
                                        @error('abbreviation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="col-md-6 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">
                                          <input
                                              type="checkbox"
                                              id=""
                                              class="checkbox"
                                              name="is_active"
                                              placeholder=""
                                          />
                                        InActive*</label>
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
                                    <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                      <label class="" for="">Series Detail*</label>
                                      <select class="form-select mt-1" id="">
                                        @foreach($series as $key)
                                          <option value="{{$key->id}}">{{$key->name}}</option>
                                        @endforeach  
                                      </select>
                                      </div>
                                    </div>
                                      <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">Image*</label>
                                        <input
                                          type="file"
                                          id=""
                                          class="form-control mt-1"
                                          name="image"
                                          placeholder=""
                                        />
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
                <th>Publisher Name</th>
                <th>Name in Urdu</th>
                <th>Address</th>
                <th>Address in Urdu</th>
                <th>Abbreviation</th>                
                <th>Description</th>
                <th>Series in Detail</th>
                <th>Images</th>
                
                <th>Action</th>
              </tr>
            </thead>
            <tbody> 
              @forelse ($publishers as $publisher)
                <tr>
                
                  <td>{{ $publisher->name }}</td>
                  <td>{{ $publisher->name_urdu }}</td>
                  <td>{{ $publisher->address }}</td>
                  <td>{{ $publisher->address_in_urdu }}</td>
                  <td>{{ $publisher->abbreviation }}</td>
                  <td>{{ $publisher->description }}</td>
                  <td>{{ $publisher->is_active }}</td>

                  <td>{{ $publisher->image }}</td>
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
                  <td colspan="5">No publisher found</td>
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