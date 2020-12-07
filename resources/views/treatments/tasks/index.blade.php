@extends('layouts.app')

@section('content')

<!-- Header -->
<div class="header bg-primary pb-6 pt-5">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tables</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="{{ route('treatments.create') }}" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Treatment Tasks</h3>
        </div>

        <!-- Select Treatment -->
        <select class="form-control w-75 mx-3" data-style="btn btn-link" name="turtle-type" id="select-treatment">
          @foreach($treatments as $t)
          <option value="{{ $t->id }}">{{ $t->title }}
          </option>
          @endforeach 
        </select>


        <div class="table-responsive mt-3">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">Title</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($tasks as $t)
              <tr>

                <!-- Title -->
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">{{ $t->title }}</span>
                    </div>
                  </div>
                </th>

                <!-- Action -->
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="/treatments/{{ $t->treatment->id }}/tasks/{{ $t->id }}/edit" id="form-{{ $t->id }}/edit">Edit</a>
                      <button class="dropdown-item btn-delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $t->id }}">Delete</button>

                      <form method="POST" action="/treatments/{{ $t->treatment->id }}/tasks/{{ $t->id }}" id="form-{{ $t->id }}">
                        @csrf
                        @method('DELETE')
                      </form>

                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete for Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Treatment task deleted from here will still be backed up for 30 days before being deleted permanently
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="btn-delete-sure" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

@endsection


@push('js')
<script type="text/javascript">
  $(document).ready(function() {

    // Initially select treatment
    const id = "<?php echo $treatment->id; ?>";
    $("#select-treatment").val(id);

    // Change treatment
    $("#select-treatment").change(function() {
      const id = $(this).val();
      location.href = `/treatments/${id}/tasks`;
    });

    // Delete 
    $(".btn-delete").click(function(e) {
      e.preventDefault();

      const id = $(this).data('id');

      $("#btn-delete-sure").click(function() {
        $(`#form-${id}`).submit();
      });
    });
  });
</script>
@endpush