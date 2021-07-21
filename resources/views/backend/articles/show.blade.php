@extends('backend.layouts.app')
@section('main-content')
    <br/>
  <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Article Detail</h3>
        </div>
        <div class="card-body">
          <div class="row">
                <div class="col-12">
                    <div class="post">
                      <div class="user-block text-bold" style="font-size: 17px;">
                          Article Title :
                      </div>
                      <p style="font-size: 17px;">
                        {{ $article->title }}
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block text-bold" style="font-size: 17px;">
                          Article Image :
                      </div>
                    <div class="post clearfix">
                      <div class="image">
                        <img class="img-rounded" src="{{ asset(imagePath($article->image, 'articles')) }}" alt="news Image" style="height:350px;width:auto;">
                    </div>
                    </div>

                    <div class="post">
                      <div class="user-block text-bold" style="font-size: 17px;">
                          Article Description :
                      </div>

                      <p style="font-size: 19px;">
                        {!! $article->content !!}
                      </p>
                      @if($article->is_featured OR $article->is_trending)
                      <div class="post">
                        @if($article->is_featured)
                        <button type="button" class="btn btn-sm btn-primary">{{ $article->is_featured ? 'Featured Article' : '' }}</button>
                        @endif
                        @if($article->is_trending)
                        <button type="button" class="btn btn-sm btn-danger">{{ $article->is_trending ? 'Trending Article' : '' }}</button>
                        @endif
                      @endif
                        <button type="button" class="btn btn-sm btn-secondary">{{ $article->views['views_status'] }}
                         <span class="badge badge-danger">{{ $article->views['number_of_views'] }}</span>
                        </button>
                      </div>
                    </div>

                    <div class="post float-end">
                        <div class="row">
                        <a class="btn btn-warning btn-sm col-md-1 col-sm-2 ml-1 mr-1" style="color: white" href="{{ route('backend.articles') }}">
                              <i class="fas fa-undo-alt" style="color: white"></i>
                              Back
                          </a>
                          <a class="btn btn-info btn-sm col-md-1 col-sm-2 ml-2" href="{{ route('backend.articles.edit', $article) }}">
                              <i class="fa fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm col-md-1 col-sm-2 ml-2" href="{{ route('backend.articles.trash', $article) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          </div>
                      </div>
                      </div>

                </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
  </div>
@endsection
