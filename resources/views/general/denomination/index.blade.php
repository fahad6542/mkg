@extends('layouts/contentLayoutMaster')

@section('title', 'Add Denomination Information')

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
          <h4 class="card-title">Add Denomination Information</h4>
           <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large"  href="javascript:void(0)" id="add_new_btn">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="ajax_model"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <form class="" id="denomination_form" name="denomination_form" method="post" action="{{route('denomination.store')}}">
                  @csrf
                    <input type="hidden" name="denomination_id" id="denomination_id">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="model_heading">Add Denomination Information</h4>
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
                                        <label class="" for="">Title*</label>
                                        <input
                                          type="text"
                                          id="name"
                                          class="form-control mt-1"
                                          name="name"
                                          placeholder="Title*"
                                        />
                                        <small class="text-danger error-message" id="name_error"></small>
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                      <label class="" for="select2-basic">Value*</label>
                                      <input
                                          type="text"
                                          id="value"
                                          class="form-control mt-1"
                                          name="value"
                                          placeholder="Value*"
                                        />
                                        <small class="text-danger error-message" id="value_error"></small>
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                      <div class="mb-1">
                                        <label class="" for="select2-basic">Index*</label>
                                        <input
                                          type="text"
                                          id="index"
                                          class="form-control mt-1"
                                          name="index"
                                          placeholder="Index*"
                                        />
                                        <small class="text-danger error-message" id="index_error"></small>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="" for="">Description*</label>
                                        <textarea
                                        class="form-control mt-1"
                                        id="description"
                                        rows="3"
                                        name="description"
                                        placeholder="Description"
                                      ></textarea>
                                      <small class="text-danger error-message" id="description_error"></small>
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                      <div class="mb-1">
                                        <label class="" for="">
                                          <input
                                              type="checkbox"
                                              id="is_active"
                                              class="checkbox"
                                              name="is_active"
                                          />
                                        Discontinue*</label>
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
                        <button type="submit" class="btn btn-primary"  id="save_btn">Save</button>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        <!--  -->
        <div class="card-datatable">
          <table class="data-table table">
            <thead>
              <tr>
                <th>Sr#</th>
                <th>Title</th>
                <th>Value</th>
                <th>Index</th>
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


@section('page-script')
<script type="text/javascript">
var table;
var jqForm = $('#denomination_form');
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('denomination.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'value', name: 'value'},
            {data: 'index', name: 'index'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    //open modal when add new btn clicked
    $('#add_new_btn').click(function () {
        // $('#save_btn').val("create-book");
        $('#denomination_id').val(''); //empty the PK
        jqForm.trigger("reset");
        $('#model_heading').html("Create New");
        $('#ajax_model').modal('show');
    });
    //open modal when edit btn clicked
    $('body').on('click', '.edit-btn', function () {
      var denomination_id = $(this).data('id');
      $.get("{{ route('denomination.index') }}" +'/' + denomination_id +'/edit', function (data) {
          $('#model_heading').html("Edit");
        //   $('#save_btn').val("edit-book");
          $('#ajax_model').modal('show');
          //filling the form
          $('#denomination_id').val(data.id);
          $('#name').val(data.name);
          $('#value').val(data.value);
          $('#index').val(data.index);
          $('#description').val(data.description);
        })
    });
   $('#save_btn').click(function(e) {
        e.preventDefault();
        $(this).html('Save');
        //removing previous validation errors if wny
        remove_error_msg();
        //checking if form is valid
        if (jqForm.valid()) {
                $.ajax({
                    data: jqForm.serialize(),
                    url: jqForm.attr("action"),
                    type: "POST",
                    dataType: 'json',
                    success: function(response) {
                        //if form is successfuly saved
                        if (response.success == true) {
                            reset_form(jqForm);//reseting for the new entry
                            $('#ajax_model').modal('hide');
                            table.draw();
                            //alert
                            toastr['success']('???? Denomination saved', 'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                            });
                        } else {//if not saved
                            display_validation_errors(response.data); //server side errors
                        }
                    },
                    error: function(data){
                        console.log('Error:', data);
                        $('#save_btn').html('Save');
                        toastr['error']('???? Unable to send request', 'Error!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    }
                });
            } else {
                toastr['error']('???? Validation Error', 'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                });
            }
        });
    });
    $('body').on('click', '.delete-btn', function () {
        var id = $(this).data("id"); //PK
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('denomination.store') }}"+'/'+id, //PK
                success: function (data) {
                    table.draw(); //needs to resolve
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        customClass: {
                        confirmButton: 'btn btn-success'
                        }
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
      }); //delete click end
}); //document ready ends
//jquery form validation
$(function () {
    'use strict';
    // jQuery Validation
    // --------------------------------------------------------------------
    if (jqForm.length) {
        jqForm.validate({
            rules: {
            'name': {
                required: true
            },
            'value': {
                required: true
            },
            'index': {
                required: true
            },
            'description': {
                required: true
            }
            }
        });
    }
});
</script>
@endsection 