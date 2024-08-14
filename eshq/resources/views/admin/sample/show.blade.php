@extends('layouts.app')

@section('title')
  {{ __('Sample Details') }}
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{ __('Sample Details') }}</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="d-flex align-items-center flex-wrap">
          <div class=" mb-2 border p-4 border-2" >
            <strong>{{ __('Doc Code') }}:</strong> {{ $sample->doc_code }}
              
          </div>
          <div class=" mb-2 border p-4 border-2">
            <strong>{{ __('Sample Category') }}:</strong> {{ $sample->sample_category }}
          </div>
          <div class=" mb-2 border p-4 border-2">
            <strong>{{ __('Prepared By') }}:</strong> {{ $sample->prepared_by }}
              
          </div>
          <div class=" mb-2 border p-4 border-2">
            <strong>{{ __('Approved By') }}:</strong> {{ $sample->approved_by }}
              
          </div>
          <div class=" mb-2 border p-4 border-2">
            <strong>{{ __('Received Package Condition') }}:</strong> {{ $sample->received_package_condition }}
              
          </div>
          <div class=" mb-2 border p-4 border-2">
            <strong>{{ __('Type of Sampling') }}:</strong> {{ $sample->type_of_sampling }}
              
          </div>
          <div class=" mb-2 border p-4 border-2">
              
            <strong>{{ __('Date and Time of Sample Received') }}:</strong> {{ $sample->date_and_time_of_sample_received }}
          </div>
          <div class=" mb-2 border p-4 border-2">
              
            <strong>{{ __('Temperature Observed When Received') }}:</strong> {{ $sample->temperature_observed_when_received }}
          </div>
          <div class=" mb-2 border p-4 border-2">
              
            <strong>{{ __('Verified By') }}:</strong> {{ $sample->verified_by }}
          </div>
      </div>
    </div>
    
</div>


    <hr>

    <h4>{{ __('Sample Details') }}</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>{{ __('Sample Identification No') }}</th>
          <th>{{ __('Date of Collection') }}</th>
          <th>{{ __('Time of Collection') }}</th>
          <th>{{ __('Temperature Upon Collection') }}</th>
          <th>{{ __('Sample Type/Outlet') }}</th>
          <th>{{ __('Location Details') }}</th>
          <th>{{ __('Sender Initials') }}</th>
          <th>{{ __('Additional Information') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sample->sampleDetails as $detail)
          <tr>
            <td>{{ $detail->sample_identification_no }}</td>
            <td>{{ $detail->date_of_collection }}</td>
            <td>{{ $detail->time_of_collection }}</td>
            <td>{{ $detail->temperature_upon_collection }}</td>
            <td>{{ $detail->sample_type_or_outlet }}</td>
            <td>{{ $detail->location_details }}</td>
            <td>{{ $detail->sender_initials }}</td>
            <td>{{ $detail->additional_information }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
