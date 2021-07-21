@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => 'About Us'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="col-12 col-md-12 col-sm-12 center">
            {!! Form::model($about, ['method'=>'PATCH', 'route' => ['backend.settings.about-update', $about->id],'files'=>true]) !!}
		        <div class="form-group">
              {!! Form::label('site_name', 'Site Name : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('site_name', $about->site_name ?? '' , ['class' => 'form-control','placeholder'=>'Enter site name']) !!}
            </div>
            <!-- Content Wrapper. Contains page content -->

            <div class="form-group">
			      {!! Form::label('site_description', 'Site Description : ', ['class' => ' font-weight-bold']) !!}
              <textarea id="summernote" name="site_description">
                {{ $about->site_description ?? 'Write about site' }}
              </textarea>
            </div>

           <div class="form-group">
			      {!! Form::label('site_terms', 'Site terms : ', ['class' => ' font-weight-bold']) !!}
              <textarea id="summernote_1" name="site_terms">
                {{ $about->site_terms ?? 'Write about site terms' }}
              </textarea>
            </div>

            <div class="form-group">
			      {!! Form::label('site_policy', 'Site Policy : ', ['class' => ' font-weight-bold']) !!}
              <textarea id="summernote_2" name="site_policy">
                {!! $about->site_policy ?? 'Write about Site Policy' !!}
              </textarea>
            </div>

           {!! Form::label('image', 'Site Logo :', ['class' => 'font-weight-bold']) !!}
            @if(isset($about->site_logo))
            <div class="form-group">
              <img src="{{ asset(imagePath($about->site_logo, 'abouts')) }}" class="img img-rounded" alt="" style="width: 300px;height:200px">
            </div>
            @endif

            <div class="form-group">
                {!! Form::label('site_logo', 'Site Logo :', ['class' => 'font-weight-bold']) !!}
                <br/>
                {!! Form::file('site_logo') !!}
            </div>

            <div class="form-group">
			    {!! Form::label('address', 'Company Address : ', ['class' => 'font-weight-bold']) !!}
			    {!! Form::text('address', $about->address ?? '' , ['class' => 'form-control','placeholder'=>'Enter site address']) !!}
		    </div>


           <div class="form-group">
			    {!! Form::label('contact_number', 'Phone : ', ['class' => 'font-weight-bold']) !!}
			    {!! Form::text('contact_number', $about->contact_number ?? '' , ['class' => 'form-control','placeholder'=>'Enter site contact']) !!}
		    </div>

            <div class="form-group">
			    {!! Form::label('email', 'Company Email : ', ['class' => 'font-weight-bold']) !!}
			    {!! Form::text('email', $about->email ?? '' , ['class' => 'form-control','placeholder'=>'Enter site email']) !!}
		    </div>

            <div class="form-group">
			    {!! Form::label('facebook', 'Facebook : ', ['class' => 'font-weight-bold']) !!}
			    {!! Form::text('facebook', $about->facebook ?? '' , ['class' => 'form-control','placeholder'=>'Enter facebook']) !!}
		    </div>
  
           @if(isset($about->site_image))
           <div class="form-group">
               <img src="{{ asset(imagePath($about->site_image, 'abouts')) }}" class="img img-rounded" alt="" style="width: 300px;height:200px">
           </div>
           @endif

           <div class="form-group">
               {!! Form::label('site_image', 'Site image :', ['class' => 'font-weight-bold']) !!}
               <br />
               {!! Form::file('site_image') !!}
           </div>

           @if(isset($about->site_banner))
           <div class="form-group">
               <img src="{{ asset(imagePath($about->site_banner, 'abouts')) }}" class="img img-rounded" alt="" style="width: 300px;height:200px">
           </div>
           @endif

           <div class="form-group">
               {!! Form::label('site_banner', 'Site banner :', ['class' => 'font-weight-bold']) !!}
               <br />
               {!! Form::file('site_banner') !!}
           </div>






            <div class="form-group col-md-3 col-sm-3">
              <input type="submit" class="btn btn-primary btn-block mt-4" value="Update">
            </div>
          </div>

        </div>
        {{ Form::close() }}
      </div>

        </div>
        <!-- /.card-body -->
    </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection

@section('headerelements')
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('footerelements')
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote({
       height: 300,
       toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            ['insert', ['link']],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen'] ]
        ],
    });
    $('#summernote_1').summernote({
       height: 300,
       toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            ['insert', ['link']],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen'] ]
        ]
    });

      $('#summernote_2').summernote({
       height: 300,
       toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            ['insert', ['link']],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen'] ]
        ]
    });
  })
</script>

@endsection
