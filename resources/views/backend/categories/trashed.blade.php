@extends('backend.layouts.app')

@section('main-content')
    @include('backend.layouts.content-header', ['header_title' => 'Trashed Categories'])
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Trashed Categories</h3>

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
                      <th style="width: 40%">
                          Category Name
                      </th>
                      <th class="text-center">
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                  <tr>
                      <td>
                           {{ Str::limit($category->name, 46, '....') }}
                      </td>

                      <td class="project-actions text-center">

                          <a class="btn btn-primary btn-sm" href="{{ route('backend.categories.restore', $category) }}">
                            <i class="fas fa-trash-restore-alt"></i>
                              Restore
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('backend.categories.delete', $category) }}" onclick="return confirm('Are you sure you want to delete this item forever?');">
                              <i class="fas fa-trash">
                            </i>
                            Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
