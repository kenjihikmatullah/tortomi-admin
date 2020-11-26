@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">

        <!-- Body -->
        <form method="post" action="" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <input type="text" class="form-control" id="input-title" placeholder="Article Title">
          </div>

          <!-- <div class="form-group">
            <textarea class="ckeditor form-control" id="input-body" name="wysiwyg-editor" placeholder="Article Body"></textarea>
          </div> -->

          <div class="form-group">
            <textarea class="form-control" id="input-body" placeholder="Article Body"></textarea>
          </div>
        </form>

        <!-- Button -->
        <button class="btn btn-outline-primary bg-white" type="button" id="btn-submit">
          Update
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function() {
    // Submit
    $('#btn-submit').click(function(e) {
      e.preventDefault();

      const title = $("#input-title").val();
      const body = $("#input-body").val();

      $.ajax({
        url: "{{ route('articles.store') }}",
        type: 'POST',
        data: {
          title: title,
          body: body,
          success: function(data) {

          }
        }
      });
    });
  });
</script>
@endpush