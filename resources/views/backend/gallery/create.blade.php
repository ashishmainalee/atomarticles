@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => $gallery ?? '' ? 'Update Image' : 'Upload Image'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <br />
        <div class="col-12 col-md-12 col-sm-12 center">
          @if($gallery ?? '')
		        {!! Form::model($gallery ?? '', ['method'=>'PATCH', 'route' => ['backend.gallery.update', $gallery], 'files'=>true]) !!}
	      	@else
			    {!! Form::open(array('method'=>'POST','route' => 'backend.gallery.store', 'files'=>true)) !!}
		      @endif

              <div class="form-group">
              {!! Form::label('title', 'Image Title : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('title', $gallery->title ?? '' , ['class' => 'form-control','placeholder'=>'Enter Image Title']) !!}
            </div>

             @if($gallery->image ?? '')
              <div class="form-group">
                <img src="{{ asset(imagePath($gallery->image, 'gallery')) }}" alt="" style="width: auto;" height="300px">
              </div>
              @endif

            <div class="form-group">
                {!! Form::label('image', 'Choose a Gallery Image :', ['class' => 'font-weight-bold']) !!}
                <br/>
                {!! Form::file('image') !!}
            </div>


            <div class="form-group">
                <div class="form-check">
                  @if($gallery ?? '')
                  <input class="form-check-input" type="checkbox" name="is_featured"  {{ $gallery->is_featured ? 'checked' : ''}}>
                  @else
                  <input class="form-check-input" type="checkbox" name="is_featured">
                  @endif
                  <label class="form-check-label"><b>Featured Gallery Image</b></label>
                </div>
            </div>

            <div class="row col-md-12">
                @if($gallery ?? '')
                <div class="form-group float-left">
                <input type="submit" class="btn btn-primary btn-md" value="Update Image">
                </div>
                @else
                <div class="form-group float-left">
                <input type="submit" class="btn btn-primary btn-md" value="Submit Image">
            </div>
                @endif
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


