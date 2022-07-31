@extends('layouts/contentLayoutMaster')

@section('title', 'Books Information')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" type="text/css" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


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

<!-- Basic multiple Column Form section start -->
<form class="form"   id="add_book" method="POST" action="{{route('books.store')}}">
  @csrf
  <section id="multiple-column-form">
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Book Information</h4>
          </div>
          <div class="card-body">
              <div class="row">
            

                <div class="col-md-11 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control @error('name') error @enderror"
                      placeholder="Product Name (English)*" name="name" />
                      @error('name')
                          <div class="danger text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="col-md-1 col-12">
                  <div class="mb-1 pb-2">
                    <label class="" for="inv_display_name">
                      <input type="radio" class="form-check-input mt-1" name="inv_display_name"
                            title="Display English Name on Invoice" value="name"/>
                    </label>
                  </div>
                </div>
                <div class="col-md-11 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control @error('name_urdu') error @enderror"
                      name="name_urdu" placeholder="Product Name (Urdu)*" />
                  </div>
                </div>

                <div class="col-md-1 col-12">
                  <div class="mb-3">
                      <label class="" for="inv_display_name">
                          <input type="radio" class="form-check-input mt-1" name="inv_display_name"
                                title="Display Urdu Name on Invoice" value="urdu_name"/>
                        </label>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control" placeholder="Book" value="Book" name="product_id" readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control @error('label_txt') error @enderror"
                      name="label_txt" placeholder="Label Text*"/>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control @error('barcode') error @enderror"
                      name="barcode" placeholder="Product Code*" title="Input using barcode reader"/>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <input type="date" class="form-control @error('manufacturing_date') error @enderror"
                      name="manufacturing_date" placeholder="Month Year" />
                  </div>
                </div>

                <div class="col-12">
                  <div class="mb-1">
                      <textarea name="description" class="form-control @error('description') error @enderror" rows="3"
                                placeholder="Product Description*"></textarea>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="text" class="form-control @error('purchase_price') error @enderror"
                      name="l_purchase_price" placeholder="Purchase Price"/>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="text" id="comission" class="form-control @error('comission') error @enderror"
                      name="l_comission" placeholder="Comission"/>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="text" id="sale_price" class="form-control @error('l_sale_price') error @enderror"
                      name="l_sale_price" placeholder="Sale Price"/>
                  </div>
                </div>

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="text" id="weight" class="form-control @error('weight') error @enderror"
                      name="weight" placeholder="Weight"/>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <input type="text" id="dimensions" class="form-control @error('dimensions') error @enderror"
                      name="dimensions" placeholder="Dimensions"/>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="number" id="total_pages" class="form-control @error('total_pages') error @enderror"
                      name="total_pages" placeholder="No. of Pages" />
                  </div>
                </div>

                

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input type="text" id="size" class="form-control @error('size') error @enderror"
                      name="size" placeholder="Size" />
                  </div>
                </div>

            

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input list="Publisher" name="browser" placeholder="Publisher*" id="browser"   class="form-control @error('code') error @enderror">

                      <datalist id="Publisher">
                        <option value="Edge">
                        <option value="Firefox">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                      </datalist>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <select class="select2 form-select" id="select2-Unit" name="author">
                    @foreach($authors as $x => $val)
                      <option value="{{$x}}">{{$val}}</option>
                    @endforeach  
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                  <select class="select2 form-select" id="select2-Unit" name="class_id">
                    @foreach($classes as $x => $val)
                      <option value="{{$x}}">{{$val}}</option>
                    @endforeach  
                    </select>
                  </div>
                </div>
                <!--  -->
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Topic</label> -->

                    <select class="select2 form-select" id="select2-Unit" name="topic_id">
                    @foreach($topics as $x => $val)
                      <option value="{{$x}}">{{$val}}</option>
                    @endforeach  
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Topic</label> -->

                    <select class="select2 form-select" id="select2-Unit" name="language_id">
                    @foreach($languages as $x => $val)
                      <option value="{{$x}}">{{$val}}</option>
                    @endforeach  
                    </select>
                  </div>
                </div>



                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Language</label> -->

                    <select class="select2 form-select" id="select2-Subject">
                      <option value="">Edition*</option>
                    </select>

                  </div>
                </div>

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Subject</label> -->

                    <select class="select2 form-select" id="select2-Subject">
                      <option value="">Subject*</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Binding</label> -->

                    <select class="select2 form-select" id="select2-Subject">
                      <option value="">Binding*</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="country-floating">Series</label> -->

                    <select class="select2 form-select" id="select2-Subject">
                      <option value="">Series*</option>
                    </select>

                  </div>
                </div>
              
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input
                      type="text"
                      id="company-column"
                      class="form-control @error('ISBN') error @enderror"
                      name="ISBN"
                      placeholder="ISBN"
                    />
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <input
                      type="text"
                      id="company-column"
                        class="form-control @error('alternate_code') error @enderror"
                      name="alternate_code"
                      placeholder="Alternate Code"
                    />
                  </div>
                </div>

                <!--  -->



                <div class="col-12">

                </div>
              </div>
            </form>
          </div>
        </div>
          
      </div>
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Book Discount Policy</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form action="">
                      <div class="col-md-12 mt-1">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                  <tr>
                                  <th>Discount Policy</th>
                                  <th>L.Sale Price</th>
                                  <th>L.Dis %age</th>
                                  <th>L.dis Amt</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                      Retail Discount Policy
                                  </td>
                                  <td>
                                      As per Stationary L. Sale Price Fields
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                      Whole Sale Discount Policy
                                  </td>
                                  <td>
                                  <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                      Teacher Discount Policy
                                  </td>
                                  <td>
                                  <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                      School Discount Policy
                                  </td>
                                  <td>
                                  <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                      Promotional Policy
                                  </td>
                                  <td>
                                  <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                  <td>
                                      <input
                                      type="text"
                                      name=""
                                      value=""
                                        class="form-control @error('code') error @enderror"
                                      >
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>

                      </div>
                      <button type="submit" class="btn btn-Primary" data-dismiss="modal">Submit</button>
                    </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      
                      
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>

                  </div>
                </div>
              </div>
            <!-- Modale End -->

      <div class="col-3">

        <div class="card">
          <div class="card-header">
            <h4 class="card-title"></h4>
          </div>
          <div class="card-body">
            <form class="form">
              <div class="row">
                <div class="col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column">Product Image</label>
                      <a  data-bs-toggle="modal" data-bs-target="#large">Add Image</a>
                  </div>
                </div>
                <div class="col-12">
                  
                    <label class="form-label" for="first-name-column">Galery Images</label>
                    <a href="">Add Image</a>
                  
                </div>
              </div>
              
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Category</h4>
          </div>
          <div class="card-body">
              <div class="row">


                <div class="col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="last-name-column">Sub Category*</label> -->
                    <select class="form-select mt-1" id="category" name="category_id">
                        @foreach($categories as $x => $val)
                          <option value="{{$x}}">{{$val}}</option>
                        @endforeach  
                    </select>

                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="last-name-column">Sub Category*</label> -->

                    <select class="form-select mt-1" id="subcategory" name="sub_category_id">
                                      
                    </select>

                  </div>
                </div>





                <div class="col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="select2-multiple">Keywords</label> -->
                    <input
                      type="text"
                      id="Keywords-id-column"
                        class="form-control @error('keywords') error @enderror"
                      name="keywords"
                      data-role="tagsinput"
                      placeholder="Keywords"
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-1">
                    <!-- <label class="form-label" for="select2-multiple">Keywords</label> -->
                    <input
                      type="text"
                      id="Keywords-id-column"
                        class="form-control @error('additional_topics') error @enderror"
                      name="additional_topics"
                      data-role="tagsinput"
                      placeholder="Additional Topics"
                    />
                  </div>
                </div>
              </div>
          </div>

        </div>

        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Details</h4>

            <a  class="down " style="display: none;"><i data-feather='arrow-up'></i></a>

            <a  class="up"><i data-feather='arrow-down'></i></a>


          </div>
          <div class="card-body details" style="display: none;">
            <form class="form">
              <div class="row">
                <div class="col-12">
                  <div class="form-check form-check-primary">
                    <input type="checkbox" class="form-check-input" id="colorCheck1" >
                    <label class="form-check-label" for="colorCheck1">Slow Moving</label>
                  </div>
                </div>
                <div class="col-12">
                <div class="form-check form-check-primary">
                    <input type="checkbox" class="form-check-input" id="colorCheck1" >
                    <label class="form-check-label" for="colorCheck1">Web Restrict</label>
                  </div>
                </div>
                <div class="col-12">
                <div class="form-check form-check-primary">
                    <input type="checkbox" class="form-check-input" id="colorCheck1" >
                    <label class="form-check-label" for="colorCheck1">Imported</label>
                  </div>
                </div>
                <div class="col-12">
                <div class="form-check form-check-primary">
                    <input type="checkbox" class="form-check-input" id="colorCheck1" >
                    <label class="form-check-label" for="colorCheck1">Discontinue</label>
                  </div>
                </div>
                <div class="col-12">
                <div class="form-check form-check-primary">
                    <input type="checkbox" class="form-check-input" id="colorCheck1" >
                    <label class="form-check-label" for="colorCheck1">Item to be checked Daily</label>
                  </div>
                </div>



              </div>
              
            </form>
          </div>

        </div>
      </div>
    </div>

    <!--  -->
    <section class="form-control-repeater">
      <div class="row">
        <!-- Invoice repeater -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Variations</h4>
            </div>
            <div class="card-body">
              <form action="#" class="invoice-repeater">
                <div data-repeater-list="invoice">
                  <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                      
                      <div class="col-md-4 col-12">
                        <div class="mb-1">
                        <label class="form-label" for="itemname">Units</label>
                          <select class="select2 form-select" id="select2-Unit" name="unit_id">
                          @foreach($units as $x => $val)
                            <option value="{{$x}}">{{$val}}</option>
                          @endforeach  
                          </select>
                        </div>
                      </div>

                      <div class="col-md-2 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="itemcost">SKU</label>
                          <input
                            type="number"
                            class="form-control"
                            id="itemcost"
                            aria-describedby="itemcost"
                            placeholder="32"
                          />
                        </div>
                      </div>

                      <div class="col-md-2 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="itemquantity">Price</label>
                          <input
                            type="number"
                            class="form-control"
                            id="itemquantity"
                            aria-describedby="itemquantity"
                            placeholder="1"
                          />
                        </div>
                      </div>

                 

                      <div class="col-md-2 col-12 mb-50">
                        <div class="mb-1">
                          <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                            <i data-feather="x" class="me-25"></i>
                            <span>Delete</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <hr />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                      <i data-feather="plus" class="me-25"></i>
                      <span>Add New</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /Invoice repeater -->
      </div>
    </section>


    <!--  -->
    <div class="col-12 mb-1">
      <button type="submit" class="btn btn-primary me-1">Submit</button>
      <button type="button" class="btn btn-primary me-1">Send Details to Clipboard</button>
      <button type="button" class="btn btn-outline-secondary me-1">Reset</button>
      <button type="button" class="btn btn-outline-secondary me-1">Make Copy</button>
      <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">Discount Policy</button>

    </div>

    
  </section>
  
</form>








<!-- Basic Floating Label Form section end -->
@endsection

@section('vendor-script')

<script>
$(document).ready(function(){
  $(".down").click(function(){
    $(".details").slideUp();

    $(".down").hide();
    $(".up").show();
  });
  $(".up").click(function(){
    $(".details").slideDown();
    $(".up").hide();
    $(".down").show();
  });
});


        $(document).ready(function() {
       $('#category').on('change', function(e) {
          e.preventDefault();
           var cat_id = e.target.value;
          //  alert(cat_id)
           $.ajax({
               url: "{{url('/fetch-subcategory')}}",
               type: "POST",
               data: {
                   sub_category_id: cat_id,
                    _token: '{{csrf_token()}}'
               },
               success: function(data) {
                console.log(data)
                  $('#subcategory').html("");
                   $.each(data , function(index, subcategory) {
                       $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                   });
               }
           })
       });
   });
</script>

  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
  <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>


@endsection

<!-- Product Image Modal -->



              <div
                class="modal fade text-start"
                id="large"
                tabindex="-1"
                aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('content.file-manager.content-include');
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add File</button>
                    </div>
                  </div>
                </div>
              </div>
