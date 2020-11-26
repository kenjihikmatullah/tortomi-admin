@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">

        <!-- Body -->
        <form method="POST" action="/articles/{{ $article->id }}">
          @csrf
          @method('PATCH')

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Article Title" value="{{ $article->title }}">
          </div>

          <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Article Body">{{ $article->body }}</textarea>
          </div>

          <!-- Button -->
          <button class="btn btn-outline-primary bg-white" type="submit">
            Update
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

  });
</script>
@endpush