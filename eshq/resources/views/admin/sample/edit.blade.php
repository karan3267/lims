@extends('layouts.app')

@section('title')
  {{ __('Edit Sample') }}
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{ __('Edit Sample') }}</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('admin.samples.update', $sample->doc_code) }}" method="PUT">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="doc_code">{{ __('Doc Code') }}</label>
            <input type="text" class="form-control" name="doc_code" id="doc_code" value="{{ $sample->doc_code }}" disabled>
          </div>
          <div class="form-group">
            <label for="sample_category">{{ __('Sample Category') }}</label>
            <select name="category_name" class="form-control" id="sample_category" required>
              <option value="">{{ __('Select Category') }}</option>
              @foreach ($categories as $category)
                <option value="{{ $category->name }}" {{ $sample->sample_category == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          </div>
        <div class="col-md-6">
          </div>
      </div>

      <hr>

      <h4>{{ __('Sample Details') }}</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>{{ __('Sample Identification No') }}</th>
            <th>{{ __('Date of Collection') }}</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sample->sampleDetails as $detail)
            <tr>
              <td><input type="text" name="sample_details[{{ $loop->index }}][sample_identification_no]" value="{{ $detail->sample_identification_no }}"></td>
              <td><input type="date" name="sample_details[{{ $loop->index }}][date_of_collection]" value="{{ $detail->date_of_collection }}"></td>
              <td>
                <button type="button" class="btn btn-danger btn-sm delete-detail">Delete</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button type="button" class="btn btn-primary btn-sm add-detail">Add Detail</button>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection
