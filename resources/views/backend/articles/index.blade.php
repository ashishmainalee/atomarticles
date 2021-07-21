@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => 'Articles'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Articles</h3>
          @if(isset($articles) && count($articles) > 0)
          <a href="{{ route('backend.articles.trash-all') }}" class="btn btn-danger btn-sm ml-3">Trash All Articles</a>
          @endif
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 20%">
                          Article title
                      </th>
                      <th class="text-center" style="width: 20%">
                          Image
                      </th>
                      <th style="width: 11%">
                          Category
                      </th>
                       <th>
                          Description
                      </th>
                      <th>
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($articles as $article)
                  <tr>
                      <td>
                           {{ Str::limit($article->title, 46, '....') }}
                      </td>
                      <td >
                        <img alt="Avatar" class="img img-rounded" width="100%" height="120px" src="{{ asset(imagePath($article->image, 'articles')) }}">
                      </td>
                      <td class="text-center">
                          {{ $article->category->name ??  'Deleted' }}
                      </td>
                      <td>
                          {!! Str::limit($article->content, 46, '....') !!}
                      </td>

                      <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="{{ route('backend.articles.show', $article) }}">
                              <i class="far fa-eye"></i>
                              </i>
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('backend.articles.edit', $article) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('backend.articles.trash', $article) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $articles->links() }}
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
