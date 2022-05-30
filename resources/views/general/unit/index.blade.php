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
                    <a type="button" class="btn btn-relief-primary click_if_invalid" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a> </div>
				<!-- Modal -->
				<div class="modal fade text-start" id="large" tabindex="-1" aria-labelledby="myModalLabel17" aria-hidden="true">
					<form class="form" method="post" action="{{route('units.store')}}">
                        @csrf
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel17">Add Unit Information</h4>
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
																	<input type="text" id="" class="form-control mt-1 @error('title') is-invalid @enderror" name="title" placeholder="Title*" value="{{old('title')}}" />
                                                                    @error('title')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
															</div>
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="">Unit Scale</label>
																	<input type="text" id="" class="form-control mt-1 @error('scale') is-invalid @enderror" name="scale" placeholder="Title*" value="{{old('scale')}}"/>
                                                                    @error('scale')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
															</div>
															<div class="col-md-12 col-12">
																<div class="mb-1">
																	<label class="" for="">Description*</label>
																	<textarea class="form-control mt-1 @error('description') is-invalid @enderror" id="" rows="3" name="description" placeholder="Description">{{old('description')}}</textarea>
                                                                    @error('description')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
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
									<button type="submit" class="btn btn-primary">Save</button>
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
							<th>Unit Category</th>
							<th>Unit Title</th>
							<th>Unit Scale</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody> 
						@forelse ($units as $unit)
							<tr>
								<td></td>
								<td>{{ $unit->title }}</td>
								<td>{{ $unit->scale }}</td>
								<td>{{ $unit->description }}</td>
								<td></td>
							</tr> @empty
							<tr>
								<td colspan="5">No unit found</td>
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
