<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset(mix('js/scripts/extensions/ext-component-toastr.js')) }}"></script>
<script>
    'use strict';
    $( document ).ready(function() {
        @if ($errors->any())
            $('.click_if_invalid')[0].click();
        @endif

        $(function () {
        var isRtl = $('html').attr('data-textdirection') === 'rtl',
            typeSuccess = $('#type-success'),
            typeInfo = $('#type-info'),
            typeWarning = $('#type-warning'),
            typeError = $('#type-error'),
            positionTopLeft = $('#position-top-left'),
            positionTopCenter = $('#position-top-center'),
            positionTopRight = $('#position-top-right'),
            positionTopFull = $('#position-top-full'),
            positionBottomLeft = $('#position-bottom-left'),
            positionBottomCenter = $('#position-bottom-center'),
            positionBottomRight = $('#position-bottom-right'),
            positionBottomFull = $('#position-bottom-full'),
            progressBar = $('#progress-bar'),
            clearToastBtn = $('#clear-toast-btn'),
            fastDuration = $('#fast-duration'),
            slowDuration = $('#slow-duration'),
            toastrTimeout = $('#timeout'),
            toastrSticky = $('#sticky'),
            slideToast = $('#slide-toast'),
            fadeToast = $('#fade-toast'),
            clearToastObj;

        // Success Type
        @if ($message = Session::get('success'))
            toastr['success']('👋 {{$message}}', 'Success!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
        @endif

        // Info Type
        @if ($message = Session::get('info'))
            toastr['info']('👋 {{$message}}', 'Info!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
        @endif

        // Warning Type
        @if ($message = Session::get('warning'))
            toastr['warning']('👋 {{$message}}', 'Warning!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
        @endif

        // Error Type
        @if ($message = Session::get('error'))
            toastr['error']('👋 {{$message}}', 'Error!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
            });
        @endif
        });

    });

    //JQuery Form Helper functions
    function reset_form(formObject){
        formObject.trigger("reset");
        remove_error_msg();
    }

    function remove_error_msg(){
        $('.error-message').html("");
        $(".form-control").removeClass("is-invalid");
    }

    function display_validation_errors(errorsList){

        jQuery.each(errorsList, function(key, value) {
            var box_id = '#' + key;
            var msg_id = '#' + key + '_error';
            $(box_id).addClass("is-invalid");
            jQuery(msg_id).html(value);
            jQuery(msg_id).show();
        });
        toastr['error']('👋 Validation Error', 'Error!', {
            closeButton: true,
            tapToDismiss: false,
        });
    }
</script>


<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>


<!-- BEGIN: Page JS-->

@yield('page-script')

<!-- END: Page JS-->
