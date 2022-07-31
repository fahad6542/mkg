@extends('layouts/contentLayoutMaster')

@section('title', 'Books List ')

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
        <div class="card-header border-bottom">
          <h4 class="card-title">Books List</h4>
           <a type="button" class="btn btn-relief-primary" href="{{url('/')}}/books/create">Add New Books</a>

         

        </div>

        <div class="card-datatable">
           

          <table class="table data-table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Sub Category</th>
                <th>Description</th>
                <th>Author</th>
                <th>Class</th>
                <th>Comission</th>
                <th>Purchase Price</th>
                <th>Action</th>

              </tr>
            </thead>
                @foreach($data['data'] as $key)    
                    <tr>
                      <td>{{$key->name}}</td>

                      @foreach($data['category'] as $subcategory)
                        @if($key->sub_category_id== $subcategory->id)
                          <td>{{$subcategory->name}}</td>
                        @endif
                      @endforeach
                      
                      <td>{{$key->description}}</td>
                      
                      @foreach($data['meta'] as $keyy)
                          @if($key->id == $keyy->p_id)
                            @foreach($data['authors'] as $author)
                              @if($author->id == $keyy->author)
                                <td>{{$author->name}}</td>
                              @endif
                            @endforeach
                          @endif
                        @endforeach


                        @foreach($data['meta'] as $keyy)
                          @if($key->id == $keyy->p_id)
                            @foreach($data['classes'] as $classes)
                              @if($classes->id == $keyy->class_id)
                                <td>{{$classes->name}}</td>
                              @endif
                            @endforeach
                          @endif
                        @endforeach

                     
                      <td>{{$key->l_comission}}</td>
                      <td>{{$key->l_purchase_price}}</td>
                      <td>
                    
                      </td>

                      
                    </tr>
                @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</section>






<!-- Basic Floating Label Form section end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    {{-- Page js files --}}
    <script>
      $(document).ready(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

table = $('.data-table').DataTable({
    processing: true,
    serverSide: false,
    // ajax: "{{ route('subcategory.index') }}",
    // columns: [
    //     {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //     {data: 'name', name: 'name'},
    //     {data: 'title', name: 'title'},
    //     {data: 'description', name: 'description'},
    //     {data: 'action', name: 'action', orderable: false, searchable: false},          
    // ]
});
});
    </script>
 
@endsection