@include('backend.layouts.header')

<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('backend.layouts.nav')


<div class="content-wrapper">
    @include('backend.partials._messages')
    <!-- Main content -->
    @section('main-content')
    @show
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
@include('backend.layouts.footer')
