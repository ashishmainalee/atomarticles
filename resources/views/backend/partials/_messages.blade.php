@if($errors->any())
<div class="container">
@foreach ($errors->all() as $error )
    <ul class="list-group pt-2">
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error : </strong> {{ $error  }}
        </div>
    </ul>
@endforeach
</div>
@endif
