@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => 'Profile'])

   <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="col-12 col-md-12 col-sm-12 center">
            {!! Form::model($user, ['method'=>'PATCH', 'route' => ['backend.settings.profile-update'],'files'=>true]) !!}
		    <div class="form-group">
              {!! Form::label('name', 'Full Name : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('name', $user->name ?? '' , ['class' => 'form-control','placeholder'=>'Enter User name']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('email', 'E-mail : ', ['class' => 'font-weight-bold']) !!}
              {!! Form::text('email', $user->email ?? '' , ['class' => 'form-control','placeholder'=>'Enter User email']) !!}
            </div>

            @if(isset($user->profile_image))
            <div class="form-group">
              <img src="{{ asset(imagePath($user->profile_image, 'abouts')) }}" class="img img-circle" alt="" style="width: 120px;height:120px">
            </div>
            @endif

            <div class="form-group">
                {!! Form::label('profile_image', 'Profile Image :', ['class' => 'font-weight-bold']) !!}
                <br/>
                {!! Form::file('profile_image') !!}
            </div>

            <div class="form-group col-md-3 col-sm-3">
              <input type="submit" class="btn btn-primary btn-block mt-4" value="Update">
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


