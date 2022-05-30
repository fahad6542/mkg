@extends('layouts/contentLayoutMaster')

@section('title', 'Add Author Information')

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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection


@section('content')



<!-- Basic multiple Column Form section start -->
<section id="ajax-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
         <!-- Button trigger modal -->
         <div class="card-header border-bottom">
          <h4 class="card-title">Add Author Info</h4>
           <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
					      <form class="form" method="post" action="{{route('authors.store')}}">
                  @csrf
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Add Author Info</h4>
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
                                      <div class="mb-1">
                                        <label class="" for="">Author Name*</label>
                                        <input
                                          type="text"
                                          id=""
                                          class="form-control mt-1 @error('name') is-invalid @enderror"
                                          name="name"
                                          value="{{old('name')}}"
                                          placeholder="Author Name*"
                                        />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">Name in Urdu*</label>
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
                                    </div>
                                    <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="" for="">Description*</label>
                                        <textarea
                                            class="form-control mt-1 @error('description') is-invalid @enderror"
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
                <th>Author Name</th>
                <th>Name in Urdu</th>
                <th>Description</th>
                
                <th>Action</th>
              </tr>
            </thead>
            <tbody> 
						@forelse ($authors as $author)
							<tr>
							
								<td>{{ $author->name }}</td>
								<td>{{ $author->name_urdu }}</td>
								<td>{{ $author->description }}</td>
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
								<td colspan="5">No author found</td>
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