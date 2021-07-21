@extends('backend.layouts.app')

@section('main-content')
@include('backend.layouts.content-header', ['header_title' => 'Gallery'])
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gallery</h3>
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
                            Image title
                        </th>
                        <th class="text-center" style="width: 20%">
                            Image
                        </th>
                        <th class="text-center">
                            Featured Image
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gallery as $image)
                    <tr>
                        <td>
                            {{ Str::limit($image->title, 46, '....') }}
                        </td>
                        <td>
                            <img alt="Avatar" class="img img-rounded" width="100%" height="120px" src="{{ asset(imagePath($image->image, 'gallery')) }}">
                        </td>
                        <td class="text-center">
                            <button class="btn {{ $image->is_featured ? 'btn-danger' : 'btn-warning' }} btn-sm">
                            {{ $image->is_featured ?  'Yes' : 'No' }}
                            </button>
                        </td>

                        <td class="project-actions">
                            <a class="btn btn-info btn-sm" href="{{ route('backend.gallery.edit', $image->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('backend.gallery.destroy', $image->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
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
    {{ $gallery->links() }}
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection

