@extends('layouts.app')

@section('title')
  {{__('Sample Collection')}}
@endsection

@section('breadcrumb')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="fa fa-vial"></i>
          {{__('Sample Collection')}}
        </h1>
      </div><div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Sample Collection')}}</li>
        </ol>
      </div></div></div></div>
@endsection

@section('content')
<div class="card card-primary card-outline">
  <div class="card-header">
    <h3 class="card-title">{{__('Sample Collection Form')}}</h3>
    
      <a href="{{route('admin.samples.create')}}" class="btn btn-primary btn-sm float-right">
        <i class="fa fa-plus"></i> {{__('Create New Sample')}}
      </a>
    
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-lg-12">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        <form  method="GET" class="mb-3">
          <div class="row">
            <div class="col-lg-6">
              <input type="text" class="form-control" name="search" placeholder="Search by doc code, category, etc.">
            </div>
            <div class="col-lg-3">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>

        <table class="table table-striped table-bordered" width="100%">
          <thead>
            <tr>
              <th width="10px">#</th>
              <th>{{__('Doc Code')}}</th>
              <th>{{__('Sample Category')}}</th>
              <th>{{__('Prepared By')}}</th>
              <th>{{__('Received By')}}</th>
              <th>{{__('Date & Time Received')}}</th>
              <th width="120px">{{__('Action')}}</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($samples as $sample)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sample->doc_code }}</td>
                <td>{{ $sample->sample_category }}</td>
                <td>{{ $sample->prepared_by }}</td>
                <td>{{ $sample->verified_by }}</td>
                <td>{{ $sample->date_and_time_of_sample_received }}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-space-between">
                        
                    <a href="{{ route('admin.samples.show', $sample->doc_code) }}" class="btn btn-sm btn-info center">
                      <i class="fa fa-eye"></i>
                    </a>
                    <form action="{{ route('admin.samples.destroy', $sample->doc_code) }}" method="POST" id="delete-form-{{ $sample->doc_code}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-button text-center" data-sample-id="{{ $sample->doc_code}}"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('admin.samples.edit', $sample) }}" class="btn btn-sm btn-warning text-center">
                      <i class="fa fa-edit"></i>
                    </a>
                    </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center">No samples found!</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        
        </div>
    </div>

  </div>
  </div>


@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
    $('.delete-button').click(function() {
        var sampleId = $(this).data('sample-id');
        var form = $('#delete-form-' + sampleId);

        if (confirm('Are you sure you want to delete this sample?')) {
            form.submit();
        }
    });
});

</script>

<script>
  $(document).ready(function()
 {
      $('#samples-table').DataTable();
  });
</script>
@endsection