@extends('layouts/contentLayoutMaster')

@section('title', 'Add Party Nature Location')

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
          <h4 class="card-title">Add Party Nature Location</h4>
           <a type="button" class="btn btn-relief-primary" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel17">Add Party Nature Location </h4>
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
                                      <label class="" for="">Party Name*</label>
                                      <input
                                        type="text"
                                        id=""
                                        class="form-control mt-1"
                                        name=""
                                        placeholder="Party Name*"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                      <label class="" for="">
                                        <input
                                            type="checkbox"
                                            id=""
                                            class="checkbox"
                                            name=""
                                            placeholder="Account Name*"
                                        />
                                      InActive*</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-12 d-flex justify-content-end">
                                    <div class="mb-1">
                                      <label class="" for="">
                                        <input
                                            type="checkbox"
                                            id=""
                                            class="checkbox"
                                            name=""
                                        />
                                      VPP*</label>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-12 col-12">
                                  <div class="mb-1">
                                      <label class="" for="">Description*</label>
                                      <textarea
                                      class="form-control mt-1"
                                      id=""
                                      rows="3"
                                      placeholder="Description"
                                    ></textarea>
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
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
        
             


        <!--  -->
        <div class="card-datatable">
          <table class="datatables-ajax table table-responsive">
            <thead>
              <tr>
                <th>Party Name</th>
                <th>Description</th>
                
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Basic Floating Label Form section end -->
@endsection