@extends('layouts.app')

@section('content')
<div class="bg-primary container-fluid pb-6 pt-5">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card-body">

        <!-- Body -->
        <form method="POST" action="/treatments/{{ $treatment->id }}">
          @csrf
          @method('PATCH')

          <div class="form-group">
            <select class="form-control selectpicker" data-style="btn btn-link" name="turtle-type">
              @foreach($turtle_types as $t)
              <option value="{{ $t->id }}" selected={{ $treatment->turtleType->id == $t->id }}>
                {{ $t->name }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $treatment->title }}">
          </div>

          <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Body...">{{ $treatment->body }}</textarea>
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