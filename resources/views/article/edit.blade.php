@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<!-- <script src="{{ asset('ckeditor') }}/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // $('.ckeditor').ckeditor();

    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  });
</script>
@endpush