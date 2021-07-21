@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => $article ?? '' ? 'Update Article' : 'Create Article'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <br />
        <div class="col-12 col-md-12 col-sm-12 center">
          @if($article ?? '')
		        {!! Form::model($article ?? '', ['method'=>'PATCH', 'route' => ['backend.articles.update', $article], 'files'=>true]) !!}
	      	@else
			    {!! Form::open(array('method'=>'POST','route' => 'backend.articles.store', 'files'=>true)) !!}
		      @endif
            <div class="form-group">
              {!! Form::label('title', 'Article Title : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('title', $article->title ?? '' , ['class' => 'form-control','placeholder'=>'Enter article title']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('category_id', 'Category:', ['class' => 'font-weight-bold']) !!}
            <select class="form-control"  name="category_id">
            @if(isset($categories) && count($categories) > 0)
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"{{ $category->id === ($article->category->id ?? '') ? ' selected' : '' }}>{{ $category->name ?? '' }}</option>
            @endforeach
            @endif
            </select>
            </div>

            <div class="form-group">
              <label><strong>Description :</strong></label>
              <textarea class="wysihtml5 textarea_editor form-control" rows="15" name="content" placeholder="Write about article.">
                {{ $article->content ?? '' }}
              </textarea>
            </div>

             @if($article->image ?? '')
              <div class="form-group">
                <img src="{{ asset(imagePath($article->image, 'articles')) }}" alt="" style="width: auto;" height="300px">
              </div>
              @endif

            <div class="form-group">
                {!! Form::label('image', 'Article Image :', ['class' => 'font-weight-bold']) !!}
                <br/>
                {!! Form::file('image') !!}
            </div>

            <div class="form-group">
              {!! Form::label('video_url', 'Article video url : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('video_url', $article->video_url ?? '' , ['class' => 'form-control','placeholder'=>'Enter article video url']) !!}
            </div> 

            <div class="form-group">
                <div class="form-check">
                  @if($article ?? '')
                  <input class="form-check-input" type="checkbox" name="is_featured"  {{ $article->is_featured ? 'checked' : ''}}>
                  @else
                  <input class="form-check-input" type="checkbox" name="is_featured">
                  @endif
                  <label class="form-check-label"><b>Featured Article</b></label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                  @if($article ?? '')
                  <input class="form-check-input" type="checkbox" name="is_trending"  {{ $article->is_trending ? 'checked' : ''}}>
                  @else
                  <input class="form-check-input" type="checkbox" name="is_trending">
                  @endif
                  <label class="form-check-label"><b>Trending Article</b></label>
                </div>
            </div>


            <div class="row col-md-12">
                @if($article ?? '')
                <div class="form-group float-left">
                <input type="submit" class="btn btn-primary btn-md" value="Update Article">
                </div>
                @else
                <div class="form-group float-left">
                <input type="submit" class="btn btn-primary btn-md" value="Create Article">
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

@section('headerelements')
  <link rel="stylesheet" href="{{ asset('backend/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />
@endsection

@section('footerelements')
<script src="{{ asset('backend/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
 <!-- wysuhtml5 Plugin JavaScript -->
        <script src="{{ asset('backend/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
         <script>
            $(document).ready(function() {
                $('.textarea_editor').wysihtml5();
            });
        </script>
@endsection
