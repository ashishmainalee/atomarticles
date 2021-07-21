@extends('frontend.layouts.app')

@section('main-content')
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h2>Gallery</h2>
            </div>
            <div class="pull-right">
                <ul class="page-title-breadcrumb">
                    <li><a href="{{ route('frontend.home') }}"><span class="fa fa-home"></span>Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

    <!-- Main content -->
    	<!--Gallery Section-->
    <section class="gallery-section-two">
        <div class="auto-container">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  @foreach($gallery as $image)
                    
                  <div class="col-sm-2">
                    <a href="{{ asset(imagePath($image->image, 'gallery')) }}" data-toggle="lightbox" data-title="{{ $image->title }}" data-gallery="gallery">

                      <img src="{{ asset(imagePath($image->image, 'gallery')) }}" class="img-fluid mb-2" alt="{{ $image->image }}"/>
                    </a>
                  </div>

                  @endforeach
                </div>
              </div>
            </div>
            <div class="card-footer">
              {{$gallery->links()}}
            </div>
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('headerelements')
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection

@section('footerelements')
<!-- Ekko Lightbox -->
<script src="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<!-- Page specific script -->

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
</script>
@endsection
