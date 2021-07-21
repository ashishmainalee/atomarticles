@extends('backend.layouts.app')

@section('main-content')

    @include('backend.layouts.content-header', ['header_title' => 'Gallery'])

    <!-- Main content -->
    <section class="content">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Gallery Images</h4>
              </div>
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
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
