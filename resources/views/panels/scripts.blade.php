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
</script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>



<!-- BEGIN: Page JS-->

@yield('page-script')

<!-- END: Page JS-->
