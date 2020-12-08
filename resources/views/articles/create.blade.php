@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">

        <img id="image" class="img-fluid rounded" accept="image/*" />

        <!-- Body -->
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="input-image" class="text-secondary">Gambar untuk Artikel</label>
            <input type="file" class="form-control-file" name="image" id="input-image">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Article Title">
          </div>

          <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Article Body"></textarea>
          </div>

          <!-- Button -->
          <button class="btn btn-outline-primary bg-white" type="submit">
            Create
          </button>

        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function() {
    $("#input-image").change(function(e) {
      const file = e.target.files[0];
      const url = window.URL.createObjectURL(file);
      console.log(url);
      $("#image").attr("src", url);
    });
  });
</script>
@endpush