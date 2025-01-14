<script src="{{ URL::asset('assets/bundles/libscripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/bundles/vendorscripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script src="{{ URL::asset('assets/bundles/mainscripts.bundle.js') }}" type="text/javascript"></script>
<script>
  var APP_URL = "{{ env('APP_URL') }}";
</script>
<script src="{{ URL::asset('assets/js/subjs/app.js') }}" type="text/javascript"></script>
@stack('scripts')