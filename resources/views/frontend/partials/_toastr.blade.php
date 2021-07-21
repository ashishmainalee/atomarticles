<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @elseif(Session::has('error'))
    toastr.error("{{Session::get('error')}}")
    @endif

</script>

