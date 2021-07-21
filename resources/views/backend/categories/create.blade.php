@extends('backend.layouts.app')
@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => $category ?? '' ? 'Update Category' : 'Create Category'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <br />
        <div class="col-12 col-md-12 col-sm-12 center">

          @if($category ?? '')
		        {!! Form::model($category ?? '', ['method'=>'PATCH', 'route' => ['backend.categories.update', $category]]) !!}
	      	@else
			    {!! Form::open(array('method'=>'POST','route' => 'backend.categories.store')) !!}
		      @endif
            <div class="form-group">
              {!! Form::label('name', 'Category Name : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('name', $category->name ?? '' , ['class' => 'form-control','placeholder'=>'Enter category name']) !!}
            </div>

            <div class="form-group">
                <div class="form-check">
                  @if($category ?? '')
                  <input class="form-check-input" type="checkbox" name="is_featured"  {{ $category->is_featured ? 'checked' : ''}}>
                  @else
                  <input class="form-check-input" type="checkbox" name="is_featured">
                  @endif
                  <label class="form-check-label"><b>Featured category</b></label>
                </div>
            </div>

            @if($category ?? '')
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-md" value="Update category">
            </div>
            @else
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-md" value="Create category">
            </div>
            @endif
          </div>
          {!! Form::close() !!}
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

