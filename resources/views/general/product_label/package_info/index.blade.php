@extends('layouts/contentLayoutMaster')

@section('title', 'Package Information')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <h4 class="card-title">Add Package Information</h4>
           <a type="button" class="btn btn-relief-primary" data-bs-toggle="modal" data-bs-target="#large" href="">Add New</a>
        </div>
              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel17">Add Package Information</h4>
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
                                    <label class="" for="select2-basic">Package Title*</label>
                                    <input
                                        type="text"
                                        id=""
                                        class="form-control mt-1"
                                        name=""
                                        placeholder="Package Title*"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                      <label class="" for="">School*</label>
                                      <select class="form-select mt-1" id="">
                                      <option value="">Select</option>
                                    </select>
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
                                    <div class="col-md-12" >
                                      <div class="row">
                                        <div class="col-md-2 col-12" id="">
                                            <div class="mb-1">
                                                <label class="" for="">Product Name*</label>
                                                <select class="form-select mt-1" id="">
                                                <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-12">
                                            <div class="col-md-12">
                                                <div class="form-row row">
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:100px">Sales Price</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:120px">Gross Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">%Discount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">Disc.Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:100px">Net Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label for="" class="form-label">Description</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <i class="fa fa-trash-o mt-2 btn delete_row" type="submit"  style="font-size:40px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="detail">


                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                                <div class="col-md-1">
                                                    <input type="button" value="Add Row" id="add_row" class="btn btn-primary add_row" >
                                                </div>
                                            </div>
                                            <div class="col-md-5"></div>
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
                <th>Group Name</th>
                <th>Category Title</th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#add_row").click(function(){
      console.log(12);
    var detail_html = `
    <div class="col-md-12" >
                                      <div class="row">
                                        <div class="col-md-2 col-12" id="">
                                            <div class="mb-1">
                                                <label class="" for="">Product Name*</label>
                                                <select class="form-select mt-1" id="">
                                                <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-12">
                                            <div class="col-md-12 demo">
                                                <div class="form-row row">
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:100px">Sales Price</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:120px">Gross Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">%Discount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label">Disc.Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <label for="" class="form-label" style="width:100px">Net Amount</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label for="" class="form-label">Description</label>
                                                    <input type="number" class="form-control mt-1" id="">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    <i class="fa fa-trash-o mt-2 btn delete_row"  type="submit" style="font-size:40px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    `;
    $("#detail").append(detail_html);
  });
});

$(document).on('click',".delete_row",function(){
         $(this).parent().parent().parent().parent().parent().remove();
    
    });

</script>
