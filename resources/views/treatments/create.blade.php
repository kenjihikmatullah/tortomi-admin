@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">

        <!-- Body -->
        <form method="POST" action="{{ route('treatments.store') }}">
          @csrf

          <div class="form-group">
            <select class="form-control selectpicker" data-style="btn btn-link" name="turtle-type">
              @foreach($turtle_types as $t)
              <option value="{{ $t->id }}">{{ $t->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>

          <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Body..."></textarea>
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