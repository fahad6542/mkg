@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

<!-- Basic tabs start -->
<section id="basic-tabs-components">
  <div class="row match-height">
    

    <!-- Tabs with Icon starts -->
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Select or Upload Images</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="homeIcon-tab"
                data-bs-toggle="tab"
                href="#homeIcon"
                aria-controls="home"
                role="tab"
                aria-selected="true"
                ><i data-feather="home"></i> Select File</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="profileIcon-tab"
                data-bs-toggle="tab"
                href="#profileIcon"
                aria-controls="profile"
                role="tab"
                aria-selected="false"
                ><i data-feather="tool"></i> Upload File</a
              >
            </li>
           
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
            
            </div>
            <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
              

              <!-- multi file upload starts -->
              <div class="row">
                <div class="col-12">
                  <div class="card">

                    <div class="card-body">
                     
                      <form action="#" class="dropzone dropzone-area" id="dpz-multiple-files">
                        <div class="dz-message">Drop files here or click to upload.</div>
                        <input type='file' hidden id="image_1"> 
                      
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- multi file upload ends -->
            

            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Tabs with Icon ends -->
  </div>
</section>
<!-- Basic Tabs end -->


@section('vendor-script')
  <!-- vendor files -->
  <script>
      
    </script>
  <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
@endsection
