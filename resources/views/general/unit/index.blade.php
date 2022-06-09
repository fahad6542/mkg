@extends('layouts/contentLayoutMaster')
@section('title', 'Unit Info ')
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
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}"> {{-- Page Css files --}}
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
					<h4 class="card-title">Add Unit Information</h4>
                    <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large" href="javascript:void(0)" id="create_unit">Add New</a> 
				</div>
				<!-- Modal -->
				<div class="modal fade text-start" id="ajaxModel" tabindex="-1" aria-labelledby="myModalLabel17" aria-hidden="true">
					<form id="unitform" name="unitform" action="{{ route('units.store') }}" class="needs-validation" novalidate>
                        @csrf
						<input type="hidden" name="unit_id" id="unit_id">
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="modelHeading">Add Unit Information</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<section id="">
										<div class="row">
											<div class="col-12">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="select2-basic">Group Name*</label>
																	<select class="form-select mt-1 @error('group') is-invalid @enderror" id="">
																		<option value="">Select</option>
																	</select>
                                                                    @error('group')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
																</div>
															</div>
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="">Unit Title*</label>
																	<input type="text" id="title" class="form-control mt-1 @error('title') is-invalid @enderror" name="title" placeholder="Title*" value="" />
                                                                    
                                                                        <small class="text-danger error-message" id="title_error" style="display:none"></small>
                                                                    
                                                                </div>
															</div>
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="">Unit Scale</label>
																	<input type="text" id="scale" class="form-control mt-1 @error('scale') is-invalid @enderror" name="scale" placeholder="Unit Scale*" value=""/>
                                                                     
                                                                    <small class="text-danger error-message" id="scale_error" style="display:none"></small>

                                                                </div>
															</div>
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="">Description*</label>
																	<textarea class="form-control mt-1 @error('description') is-invalid @enderror" id="description" rows="3" name="description" placeholder="Description"></textarea>
                                                                     
                                                                    <small class="text-danger error-message" id="description_error" style="display:none"></small>

                                                                </div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--  -->
			<div class="card-datatable">
				<table class="datatables-ajax table table-responsive data-table">
					<thead>
						<tr>
							<th>Unit No</th>
							<th>Unit Title</th>
							<th>Unit Scale</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody> 
						
					</tbody>
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
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('units.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'scale', name: 'scale'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#create_unit').click(function () {
        $('#saveBtn').val("create-book");
        $('#unit_id').val('');
        $('#unitform').trigger("reset");
        $('#modelHeading').html("Create New Unit");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editunit', function () {
      var unit_id = $(this).data('id');
      $.get("{{ route('units.index') }}" +'/' + unit_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Unit");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');    
          $('#unit_id').val(data.id);
          $('#title').val(data.title);
          $('#scale').val(data.scale);
          $('#description').val(data.description);

      })
   });
    $('#saveBtn1').click(function (e) {
        e.preventDefault();

        $(this).html('Save');
        
        remove_error_msg();

        $.ajax({
          data: $('#unitform').serialize(),
          url: $('#unitform').attr("action"),
          type: "POST",
          dataType: 'json',
          success: function(response){
               
            if(response.success==true){
                reset_form('unitform');
                $('#ajaxModel').modal('hide');
                table.draw();
              }else{
                // jQuery.each(response.data, function(key, value){
                //     var box_id='#'+key;
                //     var msg_id='#'+key+'_error';
                //     $(box_id).addClass("is-invalid");
                //     jQuery(msg_id).html(value);
                //     jQuery(msg_id).show();
                // });
              }
                  		
         },
          error: function (data) {
          
              console.log('Error:', data);
              $('#saveBtn').html('Save');
          }
      });
    });

    function reset_form(formId){
        var formId='#'+formId;
        $(formId).trigger("reset");
        remove_error_msg();
    }

    function remove_error_msg(){
        $('.error-message').html("");
        $(".form-control").removeClass("is-invalid");
    }
    
    $('body').on('click', '.deleteunit', function () {
     
        var unit_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('units.store') }}"+'/'+unit_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
  

  });


</script>
@endsection

